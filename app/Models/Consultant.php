<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'address', 'licence',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
