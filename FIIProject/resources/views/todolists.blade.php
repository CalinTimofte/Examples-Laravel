@extends('partials.master')
@section('main')

<h1 class="display-4 text-center">Lists</h1>
<a href="/FIIProject/public/todolists/add">
    <button type="button" class="btn btn-primary btn-block">
        Add
    </button>
</a>
<div class="container align-content-center mt-5">
    @foreach($todolists as $todolist)
    <div class="list-group list-group-horizontal">
        <a href="/FIIProject/public/todolists/{{$todolist->id}}" class="list-group-item list-group-item-action">{{$todolist->name}}</a>
        <form action="/FIIProject/public/todolists/delete/{{$todolist->id}}" method="post" >
            @csrf
            <button type="submit" class="btn btn-danger list-group-item list-group-item-danger">
                Delete
            </button>
        </form>
    </div>
    @endforeach
</div>

@endsection

