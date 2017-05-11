<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    protected $request;
    protected $task;

    public function __construct(Request $request)
    {
        $this->task = new \App\Task;
        $this->request = $request;
    }

    public function index() {

        return view('tasks', ['tasks' => $this->task->GetTasks ($this->request->user()->id)]);
    }

    public function save () {
        $this->task->AddTasks ($this->request);
         return view('tasks', ['tasks' => $this->task->GetTasks ($this->request->user()->id)]);
    }
    public function delete ($id) {
        $this->task->DellTasks($id);
         return view('tasks', ['tasks' =>  $this->task->GetTasks ($this->request->user()->id)]);
    }

    public function edit ($id) {
        //$task= Task::WaveTask($id) ;
        return view('edit_tasks', ['task' =>  $this->task->ViewTask($id)]);
    }
}
