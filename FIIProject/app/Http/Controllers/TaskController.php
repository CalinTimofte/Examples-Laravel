<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Todolist;

class TaskController extends Controller
{
    public function add($id)
    {
        $todolist = Todolist::find($id);
        if($todolist){
            return view('tasks-add', ['tasks-add' => $todolist]);
        }
        return redirect('/todolists/{id}');
    }

    public function create(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->description=$request->description;
        $task->todolist_id=//TODO;
        $todolist->save();
        return redirect('/todolists/{id}');
    }

    public function done($id)
    {
        $task = Task::find($id);
        if($task){
            $task->delete();
        }
        return redirect('/todolists/{id}');
    }
}
