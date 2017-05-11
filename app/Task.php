<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
class Task extends Model
{
    public static function GetTasks ()
    {
        $tasks = self::orderBy('created_at', 'asc')->get();
        return $tasks;
    }

    public static function DellTasks ($id)
    {
        self::findOrFail($id)->delete();
        return redirect()->route('tasks');
    }

    public static function AddTasks ($request)
    {
        $input = $request->all();

        $rules = array(
            'name' => 'required|max:200|min:4',
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('tasks')
                ->withInput()
                ->withErrors($validator);
        }
        $task = new \App\Task;
        $task->task_id = $request->user()->id;
        $task->task = $request->name;
        $task->save();
        return redirect()->route('tasks');
    }

}
