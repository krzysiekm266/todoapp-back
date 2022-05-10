<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse as HttpFoundationJsonResponse;

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

        $task = Task::create(
            [
                'title'=>$request->title,
                'completed'=>false
            ]);
        $task->save();

        return $task;
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

    public function update(Request $request, Task $task)
    {
        // $task->update([
        //     'title' => $request->title,
        //     'completed' => $request->completed,
        //     'compleated_at' => $request->compleated_at ,
        // ]);
        $task->update([
            'title' => $request->title,
            'completed' => $request->completed,
            'completed_at' => $request->completed_at,
        ]);



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
