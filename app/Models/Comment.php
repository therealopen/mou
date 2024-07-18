<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_id',
        'contract_status',
        'reason_name',
        'user_id', // Add user_id to fillable array
    ];

    // Define the relationship with Contract
    // Define the relationship with Contract
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
