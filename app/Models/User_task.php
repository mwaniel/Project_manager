<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_task extends Model
{
   use HasFactory;

   protected $fillable = [
       'user_id',
       'task_id',
       'status_id',
       'remarks',
       'due_date',
       'start_time',
       'end_time',
   ];

   /**
    * Define a many-to-one relationship with the User model.
    */
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   /**
    * Define a many-to-one relationship with the Task model.
    */
   public function task()
   {
       return $this->belongsTo(Task::class);
   }

   /**
    * Define a many-to-one relationship with the Status model.
    */
   public function status()
   {
       return $this->belongsTo(Status::class);
   }
}
