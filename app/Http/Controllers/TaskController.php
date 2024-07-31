<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return TaskResource::collection($tasks);
    }


    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|string|unique:tasks|max:255',
            'description' => 'sometimes|string',
            'completed' => 'sometimes|boolean',
        ]);


        if ($validator->fails()) {

            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        if (!isset($data['completed'])) {
            $data['completed'] = false;
        }


        $task = Task::create($data);
        $task->save();
        return new TaskResource($task);
    }

    /**
     * Display the specified task.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return new TaskResource($task);
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
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'sometimes|string|unique',
            'description' => 'sometimes|string',
            'completed' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $task->update($request->all());
        return new TaskResource($task);
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
        return new TaskResource($task);
    }

    /**
     * Search for a title
     *
     * @param  str  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $tasks = Task::where('title', 'like', '%' . $title . '%')->get();
        return TaskResource::collection($tasks);
    }
}
