<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title',
        'text',
        'date_public',
        'user_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'articles_id'); //
    }
}