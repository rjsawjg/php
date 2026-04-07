<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(10); // или ->simplePaginate(10)
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:10',
            'text'=>'required|max:300'
        ]);
        $article = new Article;
        $article->title = $request->title;
        $article->text = $request->text;
        $article->date_public = $request->date;
        $article->user_id = 1;
        $article->save();
        return redirect()->route('article.show', ['article'=>$article->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article/show', ['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article/edit', ['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'=>'required|min:10',
            'text'=>'required|max:300'
        ]);
        $article->title = $request->title;
        $article->text = $request->text;
        $article->date_public = $request->date;
        $article->user_id = 1;
        $article->save();
        return redirect()->route('article.show', ['article'=>$article->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
}
