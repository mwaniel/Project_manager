<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   use HasFactory;

   protected $fillable = [
       'name',
       'description',
       'due_date',
       'status_id',
   ];

   /**
    * Define a many-to-one relationship with the Status model.
    */
   public function status()
   {
       return $this->belongsTo(Status::class);
   }

   /**
    * Define a many-to-many relationship with the UserTask model.
    */
   public function userTasks()
   {
       return $this->belongsToMany(User_task::class);
   }
}
