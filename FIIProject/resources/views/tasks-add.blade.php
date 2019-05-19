@extends('partials.master')
@section('main')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/FIIProject/public/{{$todolist->id}}/task/create" method="post">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="string" class="form-control" name="name" placeholder="Name">
    </div>
    <div class="form-group">
        <label>Description</label>
        <input type="text" class="form-control" name="description" placeholder="Description">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
<a href="/FIIProject/public/todolists/{{$todolist->id}}"><button type="" class="btn btn-danger">Cancel</button></a>

@endsection