<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todolist;

class TodolistController extends Controller
{
    public function index(){
        $todolists = Todolist::orderBy('created_at')->get();
        return view('todolists', ['todolists' => $todolists]);
    }

    public function showTodolist($id){
        $todolist = Todolist::with(['tasks'])->find($id);
        if($todolist){
            return view('todolist', ['todolist' => $todolist]);
        }
        return redirect('/todolists');
    }

    public function add()
    {
        return view('todolists-add');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $todolist = new Todolist();
        $todolist->name = $request->name;
        $todolist->description=$request->description;
        $todolist->user_id=1;
        $todolist->save();
        return redirect('/todolists');
    }

    public function delete($id)
    {
        $todolist = Todolist::find($id);
        if($todolist){
            $todolist->delete();
        }
        return redirect('/todolists');
    }
}
