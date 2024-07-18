<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouDocuments extends Model
{
    use HasFactory;
    protected $table = 'documents';

    protected $fillable = [
        'mou_id',
        'file_path',
        'user_id',
    ];

        public function mou()
    {
        return $this->belongsTo(Mou::class);
    }

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
