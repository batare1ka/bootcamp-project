@extends('layouts.layout')
@section('content')
<section class="container-lg mt-5 pt-5 text-center blog__item">
    <h2 class="mt-5 pt-5">{{ $article->title }}</h2>
    <div class="row">
        <div class="col-6 offset-3 fs-6 text-muted text-center">Created at {{ $article->created_at->toDateString() }}
        </div>
        <div class="col-2 text-end">
            <a class="btn btn-primary btn-lg text-light blog-btn" href="/blog/article/update/{{ $article->id }}">Edit
                article</a>
        </div>
    </div>
    <img class="img-fluid mt-5 mx-auto d-block" src="{{ $article->image }}" alt="">
    <div class="fs-6 mt-4">
        <p class="fw-bold text-center">{{ $article->description }}</p>


        <div class="row mx-auto pt-4 my-5 g-5 justify-content-start border-bottom">
            <div class="col-sm-9 text-start px-0">
                <i class="fas fa-tag"></i>
                <a href="#" class="blog__tags"> kids clothes,</a>
                <a href="#" class="blog__tags">working mothers tips,</a>
                <a href="#" class="blog__tags">working mothers,</a>
                <a href="#" class="blog__tags">kids dressing,</a>
                <a href="#" class="blog__tags">kids clothes online</a>
            </div>
            <div class="col-sm-3 d-flex justify-content-around px-0">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                <a href="#"><i class="fab fa-gratipay"></i></a>
                <a href="#"><i class="fas fa-envelope"></i></a>
                <a href="#"><i class="fas fa-plus"></i></a>
            </div>
            <div class="col-sm-3 px-0 text-sm-start">
                <a class="text-decoration-underline" href="#"><i class="fas fa-chevron-left pe-1"></i>OLDER POST</a>
            </div>
            @auth
            <form action="/blog/{{ $article->id }}/comments" class="mb-5">
                <div class="row g-3">
                    <h4 class="mb-4">LEAVE A COMMENT</h4>
                    @csrf
                    <div class="col-12 text-start">
                        <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-chat-right-dots-fill"></i></span>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="comment"
                                rows="3" required></textarea>
                            <div class="valid-feedback">Not required!</div>
                        </div>
                        @error("comment")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                        <p class="opacity-25">All blog comments are checked prior to publishing</p>
                    </div>
                    <button type="submit" class="buy-btn m-0 w-25">
                        Post
                    </button>
                </div>
            </form>
            @else
            <p class="mb-5">
                <a href="/register">Register </a>or <a href="/login">Log in</a>
                to leave a comment
            </p>
            @endauth
        </div>
        <x-comments :comments="$article->comments" />

    </div>
</section>
@endsection