@extends('layouts.layout')
@section('content')
<section class="container sproduct my-5 pt-5">
  <div class="row mt-5">
    <div class="col-lg-5 col-md-12 col-12">
      <img class="img-fluid w-100 pb-1" src="{{ $product->img_large_url }}"
        alt="" id="MainImg" />
      <div class="small-img-group">
        <div class="small-img-col">
          <img src="{{  $product->img_large_url }}" width="100%" class="small-img" alt="" />
        </div>
        <div class="small-img-col">
          <img src="{{  $product->img_large_url }}" width="100%" class="small-img" alt="" />
        </div>
        <div class="small-img-col">
          <img src="{{  $product->img_large_url }}" width="100%" class="small-img" alt="" />
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-md-12 col-12">
      <h6>{{ $product->categories[0]->name }}</h6>
      <h3 class="py-4">{{ $product->brand->name }}</h3>
      <h4 class="text-uppercase">{{ $product->name }}</h4>
      <h2>{{ $product->price }} $</h2>
      <select class="my-3 fs-5" name="" id="size">
        <option selected disabled>Select Size</option>
        <option>XL</option>
        <option>XXl</option>
        <option>Small</option>
        <option>Large</option>
      </select>
      <input type="number" value="1" id="quantity"/>
      <button class="buy-btn add__to-cart">Add to Cart</button>
      <h4 class="my-4">Product Details</h4>
      <span class="fs-5">{{ $product->productsDetail->description }}</span>
    </div>
  </div>
</section>
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>You may also like</h3>
    <hr class="mx-auto" style="height: 3px" />
  </div>
  <div class="row mx-auto container-fluid">
    @foreach ($randomProducts as $random )
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid" src="{{  $random->img_large_url }}" alt="" />
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <h5 class="p-name">{{ $random->name }}</h5>
        <h4 class="product-price">{{ $random->price }} $</h4>
        <button class="buy-btn">Add to Cart</button>
      </div>
    </div>
    @endforeach
  </div>
</section>
<script>    
  let product = {!! json_encode($product->toArray()) !!};
  let listRandProducts = {!! json_encode($randomProducts->toArray()) !!};
</script>
@endsection