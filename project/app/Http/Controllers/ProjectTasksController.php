<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    // public function update(Task $task){

    //    $method = request()->has('completed') ? 'complete' : 'incomplete';

    //    $task->$method();

    //     // $task->update([
    //     //     'completed' => request()->has('completed')
    //     // ]);

    //     return back();
    // }

    public function store(Project $project){

        // Task::create([
        //     'project_id' => $project->id,
        //     'description' => request('description')
        // ]);
            
        $project->addTask(
            request()->validate(['description' => 'required'])
        );

        return back();
    }
}
