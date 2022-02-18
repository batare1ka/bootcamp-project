@extends('layouts.layout')
@section('content')
<section class="container">
    <div class="row pt-5 mt-5">
        <div class="col-9">
            <h2 class="mt-5 pt-5 text-center">Update Article</h2>
            <hr style="height: 3px; width: 40px; margin:0 auto 10px" />
            <form class="row needs-validation" id="updateArticleForm">
                <label for="titleUpdateInput" class="form-label">Title</label>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="bi bi-chat-text-fill"></i></span>
                    <input type="text" class="form-control" id="titleUpdateInput" placeholder="Article title" value="{{ $article->title }}"/>
                </div>
                <span class="titleError-update article__error-update" hidden></span>
                <label for="descriptionUpdateInput" class="form-label">Description</label>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="bi bi-chat-right-dots-fill"></i></span>
                    <textarea class="form-control" id="descriptionUpdateInput" rows="3"
                        placeholder="Article description">{{ $article->description }}</textarea>
                </div>
                <span class="descriptionError-update article__error-update" hidden></span>
                <div class="col-6">
                    <label for="categoryUpdateInput" class="form-label">Category</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class="bi bi-bookmark-check-fill"></i></span>
                        <select id="categoryUpdateInput" class="form-control">
                            @foreach ($categories as $category )
                            <option value="{{ $category->id }}" {{ $category->id == $article->category->id ? "selected" : ""}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="categoryError-update article__error-update" hidden></span>
                </div>
                <div class="col-6">
                    <label for="authorUpdateInput" class="form-label">User</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                        <select id="authorUpdateInput" class="form-control">
                            @foreach ($users as $user )
                            <option value="{{ $user->id }}" {{ $user->id == $article->author->id ? "selected" : ""}}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="authorError-update article__error-update" hidden></span>
                </div>
                <div class="mb-2 col-8">
                    <label for="imageUpdateInput" class="form-label">Image</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class="bi bi-card-image"></i></span>
                        <input class="form-control" accept="image/*" type="file" id="imageUpdateInput">
                    </div>
                    <span class="imageError-update article__error-update" hidden></span>
                </div>
                <div class="col-4 mt-2">
                    <img class="w-100 h-100" id="imageUpdatePreview" src="{{  \Illuminate\Support\Facades\Storage::url($article->image) }}" alt="There is no image" {{ $article->image ? "" : "hidden"}}>
                </div>
                <button type="submit" class="buy-btn mt-4 col-3 mx-auto">
                    Submit
                </button>
            </form>
            <div class="toast align-items-center text-white bg-primary border-0 mx-auto mt-5" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                  <div class="toast-body ms-auto">
                    Your article was updated.
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>
        </div>
        <div class="col-3 pt-5 mt-5">
            <div class="content-body pt-3 mt-4">
                @include('blog.popular-articles')
            </div>
        </div>
    </div>
</section>
@endsection