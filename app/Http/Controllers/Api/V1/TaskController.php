<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $tasks = Task::all();
            return response()->json($tasks);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
            ]);

            $task = Task::create($validatedData);
            return response()->json($task, 201);
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Task  $task
         * @return \Illuminate\Http\Response
         */
        public function show(Task $task)
        {
            return response()->json($task);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Task  $task
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Task $task)
        {
            $validatedData = $request->validate([
                'name' => 'max:255',
                'description' => 'required',
            ]);

            $task->update($validatedData);
            return response()->json($task);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Task  $task
         * @return \Illuminate\Http\Response
         */
        public function destroy(Task $task)
        {
            $task->delete();
            return response()->json(null, 204);
        }


}
