@extends('layout')
@section('content')


{{-- Карточка статьи --}}
<div class="card" style="width: 70rem;">
  <div class="card-body">
    <h5 class="card-title">{{$article->title}}</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">
      {{$article->user->name ?? App\Models\User::findOrfail($article->user_id)->name}}
    </h6>
    <p class="card-text">{{$article->text}}</p>
    @can('update', $article)
    <div class="d-flex justify-content-end gap-3">
      <a href="/article/{{$article->id}}/edit" class="btn btn-warning">Edit article</a>
     
      <form method="post" action="/article/{{$article->id}}">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Delete article</button>
      </form>
    </div>
    @endcan
  </div>
</div>

{{-- Блок комментариев --}}
<div class="mt-5" style="width: 70rem;">
  <h4>Комментарии ({{$comments->count()}})</h4>
  
  @if($comments->count() > 0)
    @foreach($comments as $comment)
    <div class="card mt-3">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <h6 class="card-subtitle mb-2 text-primary">
              {{$comment->user->name ?? App\Models\User::findOrfail($comment->user_id)->name}}
            </h6>
            <h5 class="card-title">{{$comment->title}}</h5>
          </div>
          <small class="text-muted">{{$comment->created_at->format('d.m.Y H:i')}}</small>
        </div>
        <p class="card-text mt-2">{{$comment->text}}</p>
        
        {{-- Кнопки для управления комментарием --}}
        @can('comment', $comment)
        <div class="d-flex justify-content-end gap-2">
        {{-- КНОПКА EDIT (теперь открывает модальное окно) --}}
        <button class="btn btn-sm btn-outline-warning" onclick="openEditModal({{$comment->id}}, '{{ addslashes($comment->title) }}', '{{ addslashes($comment->text) }}')">
            Edit
        </button>
        
        {{-- КНОПКА DELETE --}}
        <form method="post" action="/article/{{ $comment->id }}/comment/delete">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
        </form>
    </div>
    @endcan
      </div>
    </div>
    @endforeach
    
    {{-- Пагинация комментариев --}}
    <div class="d-flex justify-content-center mt-4">
      {{$comments->links()}}
    </div>
    
  @else
    <div class="alert alert-info mt-3">
      Нет комментариев. Будьте первым, кто оставит комментарий!
    </div>
  @endif
  
  {{-- Форма добавления комментария --}}
  <div class="card mt-4">
    <div class="card-header bg-light">
      <strong>Добавить комментарий</strong>
    </div>
    <div class="card-body">
      <form method="post" action="/article/{{$article->id}}/comment/create">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Заголовок комментария</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Текст комментария</label>
          <textarea class="form-control" id="text" name="text" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить комментарий</button>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактировать комментарий</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Заголовок</label>
                      <textarea class="form-control auto-resize" id="edit_title" name="title" rows="1" style="resize: vertical;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Текст</label>
                        <textarea class="form-control auto-resize" id="edit_text" name="text" rows="2" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openEditModal(id, title, text) {
    document.getElementById('editForm').action = '/article/' + id + '/comment/edit';
    
    const titleInput = document.getElementById('edit_title');
    titleInput.value = title;
    titleInput.style.height = 'auto';
    titleInput.style.height = titleInput.scrollHeight + 'px';
    
    const textarea = document.getElementById('edit_text');
    textarea.value = text;
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
    
    var modal = new bootstrap.Modal(document.getElementById('editModal'));
    modal.show();
  }
  </script>
  <script>
  function openEditModal(id, title, text) {
      // ПРАВИЛЬНЫЙ URL - с /article/
      document.getElementById('editForm').action = '/article/' + id + '/comment/edit';
      
      document.getElementById('edit_title').value = title;
      document.getElementById('edit_text').value = text;
      
      var modal = new bootstrap.Modal(document.getElementById('editModal'));
      modal.show();
  }
  </script>
@endsection