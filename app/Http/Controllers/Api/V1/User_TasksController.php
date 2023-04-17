<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User_task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class User_TasksController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTasks = User_task::all();

        return response()->json([
            'success' => true,
            'data' => $userTasks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'required|exists:tasks,id',
            'status_id' => 'required|exists:statuses,id',
            'remarks' => 'nullable|string',
            'due_date' => 'nullable|date_format:Y-m-d',
            'start_time' => 'nullable|date_format:H:i:s',
            'end_time' => 'nullable|date_format:H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $userTask = new User_task([
            'user_id' => Auth::id(),
            'task_id' => $request->input('task_id'),
            'status_id' => $request->input('status_id'),
            'remarks' => $request->input('remarks'),
            'due_date' => $request->input('due_date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);

        $userTask->save();

        return response()->json([
            'success' => true,
            'data' => $userTask
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userTask = User_task::find($id);

        if (!$userTask) {
            return response()->json([
                'success' => false,
                'message' => 'User task not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $userTask
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'exists:tasks,id',
            'status_id' => 'exists:statuses,id',
            'remarks' => 'nullable|string',
            'due_date' => 'nullable|date_format:Y-m-d',
            'start_time' => 'nullable|date_format:H:i:s',
            'end_time' => 'nullable|date_format:H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $userTask = User_task::find($id);

        if (!$userTask) {
            return response()->json([
                'success' => false,
                'message' => 'User task not found'
            ], 404);
        }

        if ($request->has('task_id')) {
            $userTask->task_id = $request->input('task_id');
        }

        if ($request->has('status_id')) {
            $userTask->status_id = $request->input('status_id');
        }

        if ($request->has('remarks')) {
            $userTask->remarks = $request->input('remarks');
        }

        if ($request->has('due_date')) {
            $userTask->due_date = $request->input('due_date');
        }

        if ($request->has('start_time')) {
            $userTask->start_time = $request->input('start_time');
        }

        if ($request->has('end_time')) {
            $userTask->end_time = $request->input('end_time');
        }

        $userTask->save();

        return response()->json([
            'success' => true,
            'data' => $userTask
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userTask = User_task::find($id);

        if (!$userTask) {
            return response()->json([
                'success' => false,
                'message' => 'User task not found'
            ], 404);
        }

        $userTask->delete();

        return response()->json([
            'success' => true,
            'message' => 'User task deleted successfully'
        ]);
    }
}
