<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $table = 'partners';

    protected $fillable = [
        'company_name',
        'company_address',
        'company_contact_number',
        'company_email',
        'representation_name',
        'representative_title',
        'representative_email',
        'representative_number'


    ];

        public function mou()
    {
        return $this->hasMany(Mou::class);
    }

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
