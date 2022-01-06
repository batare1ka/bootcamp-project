
@foreach ($products as $product)
  
<div class="product text-center col-lg-3 col-md-4 col-sm-12">
    <div class="img-container">
      <img onclick="window.location.href='{{ route('product', ['id' => $product->id]) }}';" class="img-fluid"
        src="{{  \Illuminate\Support\Facades\Storage::url($product->img_large_url) }}" alt="" />
      <span class="store-item-icon">
        <i class="fas fa-shopping-cart"></i>
      </span>
    </div>
    <div class="star" onclick="location.href='{{ route('product', ['id' => $product->id]) }}';">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <h5 class="p-name">{{ $product->name }}</h5>
      <h4 class="product-price">{{ $product->price }}</h4>
      <button class="buy-btn">Buy Now</button>
    </div>
  </div>
  @endforeach