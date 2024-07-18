<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'mou_tasks';

    protected $fillable = [
        'mou_id',
        'Task_title',
        'Task_description',
        'assigned_to',
        'task_status_name',
        'task_start_date',
        'task_end_date'
    ];

        public function mou()
    {
        return $this->belongsTo(Mou::class);
    }

    // Define the relationship with User
 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function TastStatus()
    {
        return $this->belongsTo(TaskStatus::class);
    }

   
    public function taskDeliveries()
    {
        return $this->hasMany(TaskDelivery::class);
    }


    // Define the relationship with the assigned users
    public function assignedUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
