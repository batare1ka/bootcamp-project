@extends('layouts.layout')
@section('content')
<section id="featured" class="my-5 py-5">
  <div class="container mt-5 py-4">
    <h2 class="fw-bold">Top Products</h2>
    <hr style="height: 3px" />
    <p>Here you can check out our new products fair price on CloKids</p>
  </div>
  <div class="container row mx-auto">
    
    <x-filter-products/>
    
    <div class="mx-auto col-md-9 col-sm-8" >
      <div class="row" id="product-data">
        <x-prod-item/>
        <div class="ajax-load text center">
          <img class="preloader" src="{{   \Illuminate\Support\Facades\Storage::url("preloader.gif") }}" alt="">
        </div>

      </div>
      </div>
  </div>
</section>
@endsection