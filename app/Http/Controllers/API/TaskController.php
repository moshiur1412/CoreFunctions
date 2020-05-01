<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        \Log::info('Req=API/TaskController@index Called');

        if(request()->expectsJson()){
            
            return json_encode($task::orderBy('id','DESC')->paginate(5));
        }
        
        $tasks = json_encode($task::all());

        return response()->view('tasks.index', compact('tasks'));
    }

    public function taskList(Task $task){

        // $task = $task::all();
        // return json_encode($task::paginate(5));
         return $task::all()->jsonSerialize();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Task $task, Request $request)
    {
        \Log::info('Req=API/TaskController@store Called');

        
        $task->title = $request->title;
        $task->priority = $request->priority;
        $task->save();

        if($request->expectsJson()){
            return response()->json([
                'message' => 'You have successfully created task',
                'task' => $task
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $tasks = json_encode($task->paginate(5));
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
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
        //
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
        
        if(request()->expectsJson()){
            return response()->json([
                'message' => 'Your task has been deleted successfully'
            ]);
        }
    }
}
