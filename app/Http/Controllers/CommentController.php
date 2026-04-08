<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|max:100',
            'text'=>'required|max:300'
        ]);
        Comment::create([
            'title' => $request->title,
            'text' => $request->text,
            'articles_id' => $id,
            'user_id' => 1,]);

        return redirect()->back()->with('success', 'Комментарий успешно добавлен!');
    }

    public function destroy($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Комментарий удален');
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'=>'required|max:100',
            'text'=>'required|max:300'
        ]);

        $comment = Comment::findOrFail($id);

        $comment->update([
        'title' => $request->title,
        'text' => $request->text,
        ]);

        return redirect()->back()->with('success', 'Комментарий обновлен');
    }
}
