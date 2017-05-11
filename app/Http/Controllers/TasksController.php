<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{


    public function index() {
        return view('tasks', ['tasks' => Task::GetTasks ()]);
    }

    public function save (Request $request) {
        Task::AddTasks ($request);
         return view('tasks', ['tasks' => Task::GetTasks ()]);
    }
    public function delete ($id) {
        Task::DellTasks($id);
         return view('tasks', ['tasks' =>  Task::GetTasks ()]);
    }

    public function edit ($id) {
        return view('edit_tasks',['id'=>$id]);
    }
}
