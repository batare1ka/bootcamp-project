@extends('layouts.layout')
@section('content')
<section id="blog-container" class="row container-fluid pt-5 mt-5">
  <div class="col-9 pt-3 mt-5">
    <div class="row">
      <h1 class="fw-blod text-center">Blogs</h1>
      <hr style="height: 3px; width: 40px; margin:0 auto 10px" />
      <div class="row col-12 mb-4 ">
        <form method="GET" action="/blog" class="row row-col-3 col-10 justify-content-end align-items-center">
          <div class="col-3">
            <select class="form-select" name="sort">
              <option value="DESC" {{ $filter['sort']=='DESC  ' ? "selected" : '' }}>Latest</option>
              <option value="ASC" {{ $filter['sort']=='ASC' ? "selected" : '' }}>Newest</option>
              <option value="MOST" {{ $filter['sort']=='MOST' ? "selected" : '' }}>Most Polular</option>
            </select>
          </div>
          <div class="col-3 ps-0">
            <select class="form-select" name="category">
              <option value="0" {{ (int)$filter['category']==='0' ? "selected" : '' }}>All categories</option>
              @foreach ($categories as $category )
              <option value="{{ $category->id }}" {{ (int)$filter['category']===$category->id?
                "selected": '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-3 d-flex justify-content-start p-0">
            <button class="btn btn-primary blog-btn">Apply sorting</button>
          </div>
        </form>
        <div class=" col-2 text-end">
          <a class="btn btn-primary btn-lg text-light blog-btn" href="/blog/article/create">Add article</a>
        </div>
      </div>
      @forelse ($articles as $article)
      <div class="post col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('article', ['id' => $article->id]) }}">
          <div class="post-img">
            <img class="image-fluid w-100 rounded"
              src="{{  \Illuminate\Support\Facades\Storage::url($article->image) }}" />
          </div>
          <h3 class="text-center fw-normal pt-3">
            {{ $article['title'] }}
          </h3>
        </a>
        <p class="text-center fs-6"><time>{{ $article->created_at->diffForHumans() }}</time> / {{
          $article->comments_count
          === 1 ? $article->comments_count . " Comment": ($article->comments_count === 0 ? "No comments yet" :
          $article->comments_count . " Comments")}}</p>
      </div>
      @empty
      {{ 'No articles' }}
      @endforelse
      <div class="row">
        {{ $articles->links() }}
      </div>
    </div>
  </div>
  <div class="col-3 pt-5 mt-5">
    <div class="content-body pt-3 mt-4">
      @include('blog.popular-articles')
    </div>
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
</section>
@endsection