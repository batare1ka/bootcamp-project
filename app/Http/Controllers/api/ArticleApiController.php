<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleApiController extends Controller
{
    private $responseFactory;
    public function readMostPopular(Request $request)
    {
        $mostPopularArticles = Article::all()
        ->sortByDesc("view_count")
        ->take(10);
        $articlesArray = [];
        foreach ($mostPopularArticles as  $article) {
           $articlesArray[] = [
               "id" => $article->id,
               "title" => $article->title,
               "image_url" => $article->image,
               "excerpt" => $article->excerpt,
               "view_count" => $article->view_count
           ];
        }
        return $this->responseFactory->json($articlesArray);
    }
    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }
    public function updateAnArticle($id, Request $request)
    {
        $article = Article::find($id);
        if (!$article) {
            return $this->responseFactory->json(null, 404);
        }

        $validator = Validator::make($request->all(), [
            "title" => ["bail", "required", "string", "max:200", "min:3"],
            "description" => ["bail", "required", "string", "max:300", "min:10"],
            "category" => ["bail", "required", "integer", "max:300", "min:1"],
            "author" => ["bail", "required", "integer", "max:300", "min:1"],
            "image" => ["bail", "required", "image", Rule::dimensions()->maxWidth(1024)->maxHeight(768)->minWidth(320)->minHeight(240)]
        ]);

        if ($validator->fails()) {
            return $this->responseFactory->json($validator->errors(), 400);
        }

        $article->title = $request->input("title");
        $article->description = $request->input("description");
        $article->author_id = $request->input("author");
        $article->image = $request->file("image")->store("/", "public");
        $article->excerpt = Str::limit($request->input("description"), 100);
        $article->category_id = $request->input("category");
        $article->seo_title = $request->input("title");
        $article->seo_description = Str::limit($request->input("description"), 250);
        $result = $article->save();

        if ($result) {
            return $this->responseFactory->json(null, 200);
        } else {
            return $this->responseFactory->json($validator->errors(), 400);
        }
    }
    public function createArticle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => ["bail", "required", "string", "unique:articles,title", "max:200", "min:3"],
            "description" => ["bail", "required", "string", "max:300", "min:10"],
            "category" => ["bail", "required", "integer", "max:300", "min:1"],
            "author" => ["bail", "required", "integer", "max:300", "min:1"],
            "image" => ["bail", "required", "image", Rule::dimensions()->maxWidth(1024)->maxHeight(768)->minWidth(320)->minHeight(240)]
        ]);

        if ($validator->fails()) {
            return $this->responseFactory->json($validator->errors(), 400);
        }

        $article = new Article;
        $article->title = $request->input("title");
        $article->description = $request->input("description");
        $article->author_id = $request->input("author");
        $article->image = $request->file("image")->store("/", "public");
        $article->excerpt = Str::limit($request->input("description"), 100);
        $article->category_id = $request->input("category");
        $article->seo_title = $request->input("title");
        $article->seo_description = Str::limit($request->input("description"), 250);
        $result = $article->save();
        if($result){
            return $this->responseFactory->json(['id' => $article->id], 201);
        }else{
            return $this->responseFactory->json(null, 406);
        }

    }
}
