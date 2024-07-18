<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractDelivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_id', 'contract_delivery_name', 'contract_delivery_value'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function reports()
    {
        return $this->hasMany(ContractDeliveryReport::class, 'contract_delivery_id');
    }
}
