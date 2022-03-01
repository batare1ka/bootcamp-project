@extends('layouts.layout')
@section('content')
<section id="home">
  <div class="container">
    <div class="home__sentence">
      <h5>Our clothes</h5>
      <h5 class="typing"></h5>
    </div>
    <h1><span>Best Price</span> This Year</h1>
    <p> <span>CloKids </span>offers you high quality clothes<br />for your children.</p>
    <button>Shop Now</button>
  </div>
</section>
<div id="brand" class="container border-bottom">
  <div class="row m-0 py-3">
    <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{ \Illuminate\Support\Facades\Storage::url("./images/brands/1.png") }}" alt="thereisnoimage" />
    <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{ \Illuminate\Support\Facades\Storage::url("./images/brands/2.png") }}" alt="thereisnoimage" />
    <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{ \Illuminate\Support\Facades\Storage::url("./images/brands/3.png") }}" alt="thereisnoimage" />
    <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{ \Illuminate\Support\Facades\Storage::url("./images/brands/4.png") }}" alt="thereisnoimage" />
    <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{ \Illuminate\Support\Facades\Storage::url("./images/brands/5.png") }}" alt="thereisnoimage" />
    <img class="img-fluid col-lg-2 col-md-4 col-6" src="{{ \Illuminate\Support\Facades\Storage::url("./images/brands/6.png") }}" alt="thereisnoimage" />
  </div>
</div>
<section id="new" class="w-100">
  <div class="row p-0 m-0">
    <div class="one col-lg-4 col-md-12 col-12 p-0">
      <img class="img-fluid" src="" alt="" />
      <div class="details">
        <h2>High quality fabric</h2>
        <button class="text-uppercase">Check now</button>
      </div>
    </div>
    <div class="one col-lg-4 col-md-12 col-12 p-0">
      <img class="img-fluid" src="" alt="" />
      <div class="details">
        <h2>Clothing Brands At Affordable Prices</h2>
        <button class="text-uppercase">Check now</button>
      </div>
    </div>
    <div class="one col-lg-4 col-md-12 col-12 p-0">
      <img class="img-fluid" src="" alt="" />
      <div class="details">
        <h2>CloKids is all about being better</h2>
        <button class="text-uppercase">Check now</button>
      </div>
    </div>
  </div>
</section>
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Top Products</h3>
    <hr class="mx-auto" style="height: 3px" />
    <p>Here you can check out our new products fair price on CloKids</p>
  </div>
  <div class="row mx-auto container-fluid">
  </div>
</section>
<section id="banner" class="my-5 py-5">
  <div class="container">
    <h4>Children's clothing sale</h4>
    <h1>Extra Discounts on <br />Already Reduced Merchandise</h1>
    <button class="text-uppercase">Shop Now</button>
  </div>
</section>
<section id="clothes" class="my-5">
  <div class="container text-center mt-5 py-5">
    <h3>Dresses & Rompers</h3>
    <hr class="mx-auto" style="height: 3px" />
    <p>Here you can check out our new products fair price on CloKids</p>
  </div>
  <div class="row mx-auto container-fluid">
    <x-product-item-home/>
  </div>
</section>
<section id="caps" class="my-5">
  <div class="container text-center mt-5 py-5">
    <h3>Hats & Caps</h3>
    <hr class="mx-auto" style="height: 3px" />
    <p>Here you can check out our new products fair price on CloKids</p>
  </div>
  <div class="row mx-auto container-fluid">

  </div>
</section>
<section id="coats" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Coats & Jackets</h3>
    <hr class="mx-auto" style="height: 3px" />
    <p>Here you can check out our new products fair price on CloKids</p>
  </div>
  <div class="row mx-auto container-fluid">

  </div>
  <x-flash/>
</section>
@endsection