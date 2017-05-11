<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Guard;

class Task extends Model
{

    /**
     * Tasks for users
     * @param $id - $id user
     * @return array
     */
    public function GetTasks ($id)
    {
        $tasks= DB::table('tasks')->where('task_id', '=', (int)$id)->orderBy('created_at', 'asc')->get();
        return $tasks;
    }
    /**
     * View Task detals
     * @param $id - $id user
     * @return array
     */
    public function ViewTask ($id)
    {

        $task = DB::select('select * from tasks where id = ?', [$id]);
        return $task;
    }
    /**
     * delete Task
     * @param $id - $id Task
     * @return array
     */
    public function DellTasks ($id)
    {
        $this->findOrFail($id)->delete();
        return redirect()->route('tasks');
    }

    public function AddTasks ($request)
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
        $this->task_id = $request->user()->id;
        $this->task = $request->name;
        $this->save();
        return redirect()->route('tasks');
    }

}
