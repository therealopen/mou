<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyMou extends Model
{
    use HasFactory;
       
    protected $table = 'my_mou';

    protected $fillable = [
        'mou_id',
        'email',
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
