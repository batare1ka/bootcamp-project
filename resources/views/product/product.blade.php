@extends('layouts.layout')
@section('content')
<section class="container sproduct my-5 pt-5">
    <div class="row mt-5">
      <div class="col-lg-5 col-md-12 col-12">
        <img
          class="img-fluid w-100 pb-1"
          src="{{ URL('assets/images/products/hoodies/1.jpg') }}"
          alt=""
          id="MainImg"
        />
        <div class="small-img-group">
          <div class="small-img-col">
            <img
              src="{{ URL('assets/images/products/hoodies/1.jpg') }}"
              width="100%"
              class="small-img"
              alt=""
            />
          </div>
          <div class="small-img-col">
            <img
              src="{{ URL('assets/images/products/hoodies/1-1.jpg') }}"
              width="100%"
              class="small-img"
              alt=""
            />
          </div>
          <div class="small-img-col">
            <img
              src="{{ URL('assets/images/products/hoodies/1-2.jpg') }}"
              width="100%"
              class="small-img"
              alt=""
            />
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-12 col-12">
        <h6>Home / Hoodies</h6>
        <h3 class="py-4">WAUW CAPOW</h3>
        <h6>Rudolf Fuzzy Applique Sweatshirt in Dark Green</h6>
        <h2>$100</h2>
        <select class="my-3" name="" id="">
          <option>Select Size</option>
          <option>XL</option>
          <option>XXl</option>
          <option>Small</option>
          <option>Large</option>
        </select>
        <input type="number" value="1" />
        <button class="buy-btn">Add to Cart</button>
        <h4 class="my-4">Product Details</h4>
        <span>
          Cut from a comfortable cotton stretch jersey in dark green, Wauw
          Capow By Bang Bang's top is full of holiday fun! With its Rudolf the
          red-nosed reindeer, a tactile pom pom nose and fuzzy appliqued add a
          fun and interactive twist. A pair of gold antlers competes the look.
          It would make a wonderful gift for the upcoming festive
          season.</span
        >
      </div>
    </div>
  </section>
  <section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3>You may also like</h3>
      <hr class="mx-auto" style="height: 3px" />
    </div>
    <div class="row mx-auto container-fluid">
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid" src="./products/shoes/1.jpg" alt="" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <h5 class="p-name">Kids Shoes Sports Running</h5>
          <h4 class="product-price">$52.00</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid" src="./products/shoes/2.jpg" alt="" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <h5 class="p-name">Kitty Baby Boy Sweet Sneakers</h5>
          <h4 class="product-price">$52.00</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid" src="./products/shoes/3.jpg" alt="" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <h5 class="p-name">LED Light Up Shoes</h5>
          <h4 class="product-price">$52.00</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid" src="./products/shoes/4.jpg" alt="" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <h5 class="p-name">Flame Shoes</h5>
          <h4 class="product-price">$52.00</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
    </div>
  </section>
@endsection