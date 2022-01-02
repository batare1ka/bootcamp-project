@extends('layouts.layout')
@section('content')
<section class="container-lg mt-5 pt-5 text-center blog__item">
    <h2 class="mt-5 pt-5">{{ $article->title }}</h2>
    <p class="fs-6 text-muted">On {{ $article->created_at->toDateString() }}</p>
    <img class="img-fluid mt-5 mx-auto d-block" src="{{ \Illuminate\Support\Facades\Storage::url($article->image) }}"
        alt="">
    <div class="fs-6 mt-4">
        <p class="fw-bold">{{ $article->description }}</p>


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

            <form action="" class="mb-5">
                <div class="row g-3">
                    <h4 class="mb-5">LEAVE A COMMENT</h4>
                    <div class="col-sm-6 text-start">
                        <label for="exampleInputText1" class="form-label">Your Name</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="exampleInputText1" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please choose a username.</div>
                        </div>
                    </div>
                    <div class="col-sm-6 text-start">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control" id="exampleInputEmail1" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please type your email.</div>
                        </div>
                    </div>
                    <div class="col-12 text-start">
                        <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-chat-right-dots-fill"></i></span>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <div class="valid-feedback">Not required!</div>
                        </div>
                        <p class="opacity-25">All blog comments are checked prior to publishing</p>
                    </div>
                    <button type="submit" class="buy-btn m-0 w-25">
                        Submit
                    </button>
                </div>
            </form>

        </div>
        <x-comments :comments="$article->comments"/>

    </div>
</section>
@endsection