@extends('layout')
@section('content')

@if(!empty($errors->any()))
<div class="alert alert-danger" role="alert">
<ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
</div>
@endif

<form method="post" action="/article">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Enter article`s title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Enter article`s description</label>
        <textarea name="text" id="text" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Enter article`s date public</label>
        <input type="date" class="form-control" id="date" name="date">
    </div>
    <button type="submit" class="btn btn-primary">Create article</button>
    </form>
@endsection