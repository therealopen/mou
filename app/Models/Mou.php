<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mou extends Model
{
    use HasFactory;
    
     protected $fillable = [
    
        'partner_id',
        'mou_title',
        'mou_description',
        'start_date',
        'end_date',
        'approval_mou_status',
        'mou_document',  
        // add more 
    ];

     // Define the relationship with Comment
  

     public function myMous()
     {
         return $this->hasMany(MyMou::class);
     }

     public function partner()
     {
         
         return $this->belongsTo(Partner::class);
         
     }
     public function Moudocument()
     {
         return $this->hasMany(MouDocuments::class);
     }

      // Define the relationship with Comment
      public function Moucomments()
      {
          return $this->hasMany(mou_comment::class);
      }


    // Define relationship with MouTask
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Define relationship with MouComment
    public function comments()
    {
        return $this->hasMany(mou_comment::class);
    }
    public function taskDeliveries()
{
    return $this->hasMany(TaskDelivery::class, 'task_id'); // Assuming 'task_id' is the foreign key in task_deliveries table
}
    


}
