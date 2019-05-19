<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

use App\Services\Twitter;

class ProjectsController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
        // ->only(['store', 'update']);
        // ->except(['show']);
    }

    public function index(){

        // auth()->id() // the id or NULL for a guest
        // auth()->user() // User instance
        // auth()->check() // boolean
        // if( auth()->guest())

        $projects = Project::where('owner_id', auth()->id())->get(); // select * from projects where owner_id = 4

        // return $projects;

        return view('projects.index', ['projects' => $projects]);

        // ['projects' => $projects] = compact('projects')
    }

    public function create(){
        return view('projects.create');
    }

    public function show(Project $project, Twitter $twitter){

        // if ($project->owner_id !== auth()->id()){
        //     abort(403);
        // }

        // abort_if($project->owner_id !== auth()->id(), 403);

        // abort_unless(auth()->user()->owns($project), 403); make a owns function

        // if (\Gate::denies('update', $project)){ abort(403);}

        // abort_unless(\Gate::allows('update', $project), 403);

        // $this->authorize('update', $project); //use the policy to auth the show

        // auth()->user()->cannot('update', $project);

        return view('projects.show', compact('project'));

    }

    public function edit(Project $project){

        return view('projects.edit', compact('project'));

    }


    public function update(Project $project){

        $this->authorize('update', $project);

        $project->update(request(['title', 'description']));

        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();
        return redirect('/projects');
    }


    public function destroy(Project $project){

        $this->authorize('update', $project);

        $project->delete();

        return redirect('/projects');

    }


    public function store(){

        // Project::create([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]); THIS IS USED ON UNGUARDED DATA

        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        $attributes['owner_id'] = auth()->id();

        Project::create($attributes);
        // + ['owner_id' => auth()->id()]

        return redirect('/projects');
    }
}
