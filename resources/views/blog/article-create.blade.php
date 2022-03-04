@extends('layouts.layout')
@section('content')
<section class="container">
    <div class="row pt-5 mt-5">
        <div class="col-9">
            <h2 class="mt-5 pt-5 text-center">Create Article</h2>
            <hr style="height: 3px; width: 40px; margin:0 auto 10px" />
            <form class="row needs-validation" id="createArticleForm">
                <label for="titleInput" class="form-label">Title</label>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="bi bi-chat-text-fill"></i></span>
                    <input type="text" class="form-control" id="titleInput" placeholder="Article title" />
                </div>
                <span class="titleError article__error" hidden></span>
                <label for="descriptionInput" class="form-label">Description</label>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="bi bi-chat-right-dots-fill"></i></span>
                    <textarea class="form-control" id="descriptionInput" rows="3"
                        placeholder="Article description"></textarea>
                </div>
                <span class="descriptionError article__error" hidden></span>
                <div class="col-6">
                    <label for="categoryInput" class="form-label">Category</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class="bi bi-bookmark-check-fill"></i></span>
                        <select id="categoryInput" class="form-control">
                            <option selected disabled value="">All categories</option>
                            @foreach ($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="categoryError article__error" hidden></span>
                </div>
                <div class="col-6">
                    <label for="authorInput" class="form-label">User</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                        <select id="authorInput" class="form-control">
                            <option selected disabled value="">All users</option>
                            @foreach ($users as $user )
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="authorError article__error" hidden></span>
                </div>
                <div class="mb-2 col-8">
                    <label for="imageInput" class="form-label">Image</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class="bi bi-card-image"></i></span>
                        <input class="form-control" accept="image/*" type="file" id="imageInput">
                    </div>
                    <span class="imageError article__error" hidden></span>
                </div>
                <div class="col-4 mt-2">
                    <img class="w-100 h-100" id="imagePreview" src="" alt="There is no image" hidden>
                </div>
                <button type="submit" class="buy-btn mt-4 col-3 mx-auto">
                    Submit
                </button>
            </form>
            <div class="toast align-items-center text-white bg-primary border-0 mx-auto mt-5" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                  <div class="toast-body ms-auto">
                    Your article was added.
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