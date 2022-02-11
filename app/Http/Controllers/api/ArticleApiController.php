<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ArticleApiController extends Controller
{
    private $responseFactory;
    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }
    public function editAnArticle($id, Request $request)
    {
        $article = Article::find($id);

        if (!$article) {
            return $this->responseFactory->json(null, 404);
        }

        $validator = Validator::make($request->all(), [
            "title" => ["bail", "required", "string", Rule::unique('articles')->ignore($article->id), "max:200", "min:3"],
            "description" => ["bail", "required", "string", "max:300", "min:10"],
            "excerpt" => ["bail", "required", "string", "max:100", "min:3"],
            "seo_title" => ["bail", "required", "string", "max:100", "min:3"]
        ]);

        if ($validator->fails()) {
            return $this->responseFactory->json(null, 400);
        }

        $article->title = $request->title;
        $article->description = $request->description;
        $article->excerpt = $request->excerpt;
        $article->seo_title = $request->seo_title;
        $result = $article->save();

        if ($result) {
            return $this->responseFactory->json(null, 200);
        } else {
            return $this->responseFactory->json(null, 400);
        }
    }
    public function createArticle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => ["bail", "required", "string", "unique:articles,title", "max:200", "min:3"],
            "description" => ["bail", "required", "string", "max:300", "min:10"],
            "excerpt" => ["bail", "required", "string", "max:100", "min:3"],
            "seo_title" => ["bail", "required", "string", "max:100", "min:3"],
            "seo_description" => ["bail", "required", "string", "max:250", "min:3"]
        ]);

        if ($validator->fails()) {
            return $this->responseFactory->json(null, 400);
        }

        $article = new Article;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->author_id = 5;
        $article->image = "a9d8d72721fd1b9e4619fbbc9e44c793.png";
        $article->excerpt = $request->excerpt;
        $article->category_id = 5;
        $article->seo_title = $request->seo_title;
        $article->seo_description = $request->seo_description;
        $result = $article->save();
        if($result){
            return $this->responseFactory->json(['id' => $article->id], 201);
        }else{
            return $this->responseFactory->json(null, 406);
        }

    }
}
