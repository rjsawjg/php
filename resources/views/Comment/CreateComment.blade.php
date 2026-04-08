@extends('layout')
@section('content')
<div class="card" style="width: 70rem;">
  <div class="card-body">
    <h5 class="card-title">{{$article->title}}</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">{{App\Models\User::findOrfail($article->user_id)->name}}</h6>
    <p class="card-text">{{$article->text}}</p>
    
    <div class="d-flex justify-content-end gap-3">
    <a href="/article/{{$article->id}}/edit" class="btn btn-warning">Edit article</a>
   
    <form method="post" action="/article/{{$article->id}}">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Delete article</button>
    </form>
    </div>
  </div>
</div>
@endsection