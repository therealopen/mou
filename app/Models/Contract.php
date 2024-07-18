<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'consultant_id', 'contract_name', 'contract_type', 'contract_description',
        'contract_startDate', 'contract_endDate', 'site_delivery', 'contract_value', 
        'employer', 'contract_document',
    ];

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }
    
public function contractDeliveries()
{
    return $this->hasMany(ContractDelivery::class);
}

    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
