<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Gate;
use App\Http\Resources\Task as TaskResource;
use App\Http\Requests;

class TaskController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(15);

        return view('tasks.index', ['tasks' => $tasks]);

    }

    public function create() 
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;

        $task->name = $request->input('name');
        $task->status = $request->input('status');
        $task->user_id = $request->input('user_id');

        if($task->save()) {
            $request->session()->flash('success', 'Uspješno odrađena radnja.');
        }
        else {
            $request->session()->flash('error', ' Par errora i to');
        }

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        // if(Gate::denies('edit-tasks')) {
        //     return redirect(route('tasks.index'));
        // }

        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->name = $request->name;
        $task->status = $request->status;
        $task->user_id = $request->user_id;
        
        if($task->save())
        {
            $request->session()->flash('success','task has been updated');
        }
        else 
        {
            $request->session()->flash('error', ' Error updating the task');
        }

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if(Gate::denies('view-tasks')) {
        //     return redirect(route('tasks.index'));
        // }

        $task = Task::findOrFail($id);

        return view('tasks.show', ['task', $task]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        if($task->delete()) {
            return new TaskResource($task);
        }
    }
}
