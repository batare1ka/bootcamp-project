<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\BlogCategory;
use App\Models\User;
use App\Services\ModelLogger;

class BlogController extends Controller
{

    public function index()
    {
        $request = request()->all();
        $categories = BlogCategory::all();

           if (isset($request['category']) && $request['category'] != '0') {
            $articles = Article::where('category_id', $request['category'])
            ->orderBy(isset($request['sort'])&&$request['sort']==="MOST"?'comments_count':'created_at',
             isset($request['sort'])&&$request['sort']==="MOST"? 'DESC' :
              (isset($request['sort'])&&$request['sort']==="ASC"?"ASC":'DESC'))
              ->withCount('comments')
              ->paginate(8)
              ->withQueryString();
        }else{
            $articles = Article::orderBy(isset($request['sort'])&&$request['sort']==="MOST"?'comments_count':'created_at',
             isset($request['sort'])&&$request['sort']==="MOST"? 'DESC' : 
             (isset($request['sort'])&&$request['sort']==="ASC"?"ASC":'DESC'))
             ->withCount('comments')
             ->paginate(8)
             ->withQueryString();
            }

        return view('blog.blog', [
            'articles' => $articles,
            'categories' => $categories,
            'filter' => [
                'sort' => $request['sort'] ?? 'ASC',
                'category' => $request['category'] ?? '0'
            ]
        ]);
    }
    public function showArticle($id, Request $request, ModelLogger $logger)
    {
        $article = Article::with('comments')->find($id);
        $article->view_count++;
        $article->save();
        $logger->logModel($request->user(), $article);

        return view('blog.article', ['article' => $article]);
    }
    public function create()
    {
        $categories = BlogCategory::all();
        $users = User::all();
        return view('blog.article-create', [
            "categories" => $categories,
            "users" => $users
        ]);
    }
    public function update($id)
    {
        $article = Article::with(["category", "author"])->find($id);
        $categories = BlogCategory::all();
        $users = User::all();
        return view('blog.article-update', [
            'article' => $article,
            "categories" => $categories,
            "users" => $users
        ]);
    }
}
