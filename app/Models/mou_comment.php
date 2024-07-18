<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mou_comment extends Model
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
 

    public function mou()
{
    return $this->belongsTo(Mou::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
