@extends('layout')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date public</th>
      <th scope="col">Title</th>
      <th scope="col">Text</th>
      <th scope="col">Author</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <td scope="row">{{$article->date_public}}</td>
      <td><a href="/article/{{$article->id}}" class="link-dark">{{$article->title}}</a></td>
      <td>{{$article->text}}</td>
      <td>{{App\Models\User::findOrFail($article->user_id)->name}}</td>
    </tr>
    @endforeach
  </tbody>
</table> 
{{$articles->links()}}
@endsection