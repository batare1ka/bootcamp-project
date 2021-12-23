<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\BlogCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    public function index()
    {
        // $articles = Article::orderBy('created_at', 'DESC')->get()->all();
        // $articlesOfCurrentYear = Article::select([
        //     'id',
        //     'title',
        //     'published_at',
        //     'image'
        // ])->where('published_at', '>=', Carbon::today()->startOfYear())
        //     ->where('published_at', '>=', Carbon::today()->endOfYear())
        //     ->get();
        // $lastFiveArticles = Article::select([
        //     'id',
        //     'title',
        //     'published_at',
        //     'image'
        // ])->orderBy('published_at', 'DESC')->limit(5)->get();
        // $lifeAndStyleArticles = Article::select([
        //     'articles.id',
        //     'title',
        //     'published_at',
        //     'image'
        // ])->join('blog_categories', 'blog_categories.id', '=', 'articles.category_id')
        //     ->where('blog_categories.name', '=', 'Life and Style')->get();

        //Get article title and category name from last month
        // 1.2 $artCatlastMonth = Article::select([
        //     'articles.id',
        //     'articles.title',
        //     'blog_categories.name',
        //     'articles.image'
        // ])->join('blog_categories', 'blog_categories.id', '=', 'articles.category_id')
        //     ->whereMonth('articles.published_at', '=', Carbon::today()->lastOfMonth())->get();

        //Get articles without tags
        // 1.3 $articlesWihoutTags =  Article::doesntHave('tags')->get();


        //Optional:
        // 1. Get articles count grouped by month form last year
        // $artCountGroup = Article::select(DB::raw('count(*) as `articles`'), DB::raw("DATE_FORMAT(published_at, '%m') month"))
        // ->whereYear('created_at', '=', Carbon::today()->lastOfYear())
        // ->groupby('month')
        // ->get();
        // return $artCountGroup;


        // 2. Get article name, image and tag name
        //  $artNameImgTagName = Article::with('tags:name')->get(['id','title','image']);
        // return $artNameImgTagName;

        //Get artiles of author registered in last month 
        //3
        // $artOfautLastMon = User::select([
        //     'id',
        //     'name',
        //     'email'
        // ])->whereMonth('created_at', '=', Carbon::today()->lastOfMonth())
        //     ->with(['articles' => function ($query) {
        //         $query;
        //     }])->get();
        // return $artOfautLastMon;

        //Get articles without comments
        // 4. $articlesWihoutComments =  Article::has('comments')->get();
        // return $articlesWihoutComments;

        // Get most five commented articles
        // 5
        // $mostFive = Article::select(DB::raw('count(comments.article_id) as total, articles.title'))
        //     ->join('comments', 'articles.id', '=', 'comments.article_id')
        //     ->groupBy('articles.title')
        //     ->orderBy('total', 'DESC')
        //     ->limit(5)
        //     ->get();
        // return $mostFive;

        //Get articles about COVID 
        //6
        //  $covid = Article::where('description', 'LIKE', '%covid%')->
        // orWhere('title', 'LIKE', '%covid%')->
        // orWhere('excerpt', 'LIKE', '%covid%')->get();
        // return $covid;

        //Get author with the most articles
        //7
        // $authorMostArt = Article::selectRaw('count(articles.author_id) as authors, users.name')
        //     ->join('users', 'users.id', '=', 'articles.author_id')
        //     ->groupBy('users.name')
        //     ->orderBy('authors', 'DESC')
        //     ->limit(1)
        //     ->get();

        // return $authorMostArt;

        $request = request()->all();
        $categories = BlogCategory::all();

        $articles = Article::orderBy('created_at', $request['sort'] ?? 'DESC')->simplePaginate(5);
        $articles->appends(['sort' => $request['sort'] ?? 'DESC']);

        return view('blog.blog', [
            'articles' => $articles,
            'categories' => $categories,
            'filter' => [
                'sort' => $request['sort'] ?? 'ASC',
                'category' => $request['category'] ?? $categories->first()->id
            ]
        ]);
    }
    public function showArticle($id)
    {
        $article = Article::find($id);

        return view('blog.article', ['article' => $article]);
    }
}
