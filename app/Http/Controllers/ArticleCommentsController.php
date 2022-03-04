<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleCommentsController extends Controller
{
    public function store(Article $article)
    {
        request()->validate([
            "comment" => "required"
        ]);
        
       $article->comments()->create([
        "author_email" => request()->user()->email,
        "message" => request("comment"),
       ]);

       return back();
    }
}
