@extends('partials.master')
@section('main')

<div class="container align-content-center">
    <h1 class="display-4 text-center">{{$todolist->name}}</h1>
    <h3 class="display-6 text-center">{{$todolist->description}}</h3>
    <a href="/FIIProject/public/todolists/{{$todolist->id}}/task/add">
        <button type="button" class="btn btn-primary btn-block">
            Add 
        </button>
    </a>
</div>
<div class="container align-content-center mt-5">
    @foreach($todolist->tasks as $task)
    <div class="list-group list-group-horizontal">
        <button data-toggle="collapse" data-target="#description{{$task->id}}"class="list-group-item list-group-item-action text-center">
            {{$task->name}}
            <button type="submit" class="btn btn-danger list-group-item list-group-item-danger">
                Done
            </button>
        </button>
    </div>
    <div id="description{{$task->id}}" class="collapse text-left">
        {{$task->description}}
    </div>
    @endforeach
</div>