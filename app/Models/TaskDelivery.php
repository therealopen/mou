<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDelivery extends Model
{
    use HasFactory;
    // Define fillable properties
    protected $fillable = [
        'task_id',
        'task_delivery_name',
        'task_delivery_value',
    ];

    // Define the relationship with the Task model
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
       

    // Define the relationship with the TaskDeliveryReport model
    public function deliveryReports()
    {
        return $this->hasMany(TaskDeliveryReport::class, 'task_delivery_id');
    }

 

    
}
