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

<form method="post" action="/article/{{$article->id}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Enter new article`s title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}">
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Enter new article`s description</label>
    <textarea name="text" id="text" class="form-control">{{$article->text}}"</textarea>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Enter new article`s date public</label>
        <input type="date" class="form-control" id="date" name="date" value="{{$article->date_public}}">
    </div>
    <button type="submit" class="btn btn-primary">Update article</button>
    </form>
@endsection