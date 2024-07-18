<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDeliveryReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_delivery_id',
        'task_report_delivery_value',
        'task_delivery_comment',
    ];

    public function taskDelivery()
    {
        return $this->belongsTo(TaskDelivery::class);
    }
    
}
