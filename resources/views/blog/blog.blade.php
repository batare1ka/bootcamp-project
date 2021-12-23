@extends('layouts.layout')
@section('content')
<section id="blog-home" class="pt-5 mt-5 container">
    <h1 class="fw-blod pt-5">Blogs</h1>
    <hr style="height: 3px" />
  </section>
  <section id="blog-container" class="container pt-5">
    <div class="row">
      @forelse ($articles as $article)
      <div class="post col-lg-3 col-md-6 col-12">
        <a href="{{ route('article', ['id' => $article->id]) }}">
        <div class="post-img">
          <img class="image-fluid w-100 rounded" src="{{  \Illuminate\Support\Facades\Storage::url($article->image) }}" />
        </div>
        <h3 class="text-center fw-normal pt-3">
          {{ $article['title'] }}
        </h3>
      </a>
        <p class="text-center fs-6">on Nov 2, 2021 0 Comnents</p>
      </div>
      @empty
        {{ 'No article' }}
      @endforelse
      <div >

        <form method="GET" action="/blog" class="row row-col-3 m-4">
          <div class="col">
            <select class="form-select" name="sort">
              <option value="DESC" {{ $filter['sort'] =='DESC  '? "selected": '' }}>Latest</option>
              <option value="ASC" {{ $filter['sort'] =='ASC'? "selected": ''}}>Newest</option>
            </select>
          </div>
          <div class="col">
            <select class="form-select" name="category">
              @foreach ($categories as $category )
              <option value="{{ $category->id }}" {{ (int)$filter['category'] === $category->id?
               "selected": '' }}>{{ $category->name }}</option>
              @endforeach
             
             
            </select>
          </div>
          <div class="col">
            <button class="btn btn-primary">Apply sorting</button>
          </div>

        </form>

      </div>
      <div class="row">
        {{ $articles->links() }}
      </div>
      

        <div class="col-lg-12 col-md-12 col-12 py-5">
          <div class="post-img">
            <img class="image-fluid w-100 rounded" src="{{ URL('assets/images/blog/banner.jpg') }}" alt="" />
          </div>
           </div>
           <div class="post col-lg-4 col-md-6 col-12">
            <div class="post-img">
              <img class="image-fluid w-100 rounded" src="{{ URL('assets/images/blog/6.jpg') }}" alt="" />
            </div>
            <h4 class="fw-normal pt-3">
              Dress Your Kids' Elegantly for Their Birthdays
            </h4>
          </div>
          <div class="post col-lg-4 col-md-6 col-12">
            <div class="post-img">
              <img class="image-fluid w-100 rounded" src="{{ URL('assets/images/blog/5.jpg') }}" alt="" />
            </div>
            <h4 class="fw-normal pt-3">
              Best Travel Clothes Ideas for Kids
            </h4>
          </div>
          <div class="post col-lg-4 col-md-6 col-12">
            <div class="post-img">
              <img class="image-fluid w-100 rounded" src="{{ URL('assets/images/blog/7.jpg') }}" alt="" />
            </div>
            <h4 class="fw-normal pt-3">
              Things to keep in mind while buying kids’ clothes
            </h4>
          </div>
    </div>
  </section>
@endsection