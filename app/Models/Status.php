<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;


    protected $fillable =[
    'name'
   ];

   public function userTasks()
   {
       return $this->hasMany(UserTask::class);
   }

   /**
    * Define a one-to-many relationship with the Task model.
    */
   public function tasks()
   {
       return $this->hasMany(Task::class);
   }
}



