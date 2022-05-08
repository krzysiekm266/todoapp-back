<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Task::all();

        // return  response($data)->withHeaders([
        //     'Content-Type'=>'application/json',
        //     'Access-Control-Allow-Origin' => '*',
        //     'Access-Control-Request-Method' =>'GET,HEAD,OPTIONS'

        // ]);
            return $data;
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
    public function store(Request $request)
    {
        //for testing
        $task = [
            'title'=>$request->title,
            'completed'=>false

        ];
        return Task::create($task)->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {

        return Task::where('id',$task->id)->first();
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
    // public function update(Request $request, $id)
    // {
    //     $task = Task::where('id',$id)->first();
    //     $task->completed =  !$task->completed;
    //     $task->save();
    //    return $task;
    // }
    public function update(Request $request, Task $task)
    {

        $task->completed =  !$task->completed;
        $task->save();
       return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        return $task->delete();
    }
}
