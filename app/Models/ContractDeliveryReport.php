<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractDeliveryReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_delivery_id',
        'report_delivery_value',
        'contract_delivery_comment',
    ];

 

    public function contractDelivery()
    {
        return $this->belongsTo(ContractDelivery::class, 'contract_delivery_id');
    }
}
