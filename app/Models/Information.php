<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'first_name',
        'second_name',
        'last_name',
        'age',
        'sex',
        'tin_number',
        'nida_number',
        'phone_number',
        'country',
        'city',
        'district',
        'ward',
        'street',
        'postal_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
