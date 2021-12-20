@extends('layouts.layout');
@section('content');
<section id="home">
      <div class="container">
        <h5>Our clothes for your kids</h5>
        <h1><span>Best Price</span> This Year</h1>
        <p> <span>CloKids </span>offers you high quality clothes<br />for your children.</p>
        <button>Shop Now</button>
      </div>
    </section>
    <div id="brand" class="container border-bottom">
      <div class="row m-0 py-3">
        <img
          class="img-fluid col-lg-2 col-md-4 col-6"
          src="{{ URL('assets/images/brands/1.png') }}"
          alt="thereisnoimage"
        />
        <img
          class="img-fluid col-lg-2 col-md-4 col-6"
          src="{{ URL('assets/images/brands/2.png') }}"
          alt="thereisnoimage"
        />
        <img
          class="img-fluid col-lg-2 col-md-4 col-6"
          src="{{ URL('assets/images/brands/3.png') }}"
          alt="thereisnoimage"
        />
        <img
          class="img-fluid col-lg-2 col-md-4 col-6"
          src="{{ URL('assets/images/brands/4.png') }}"
          alt="thereisnoimage"
        />
        <img
          class="img-fluid col-lg-2 col-md-4 col-6"
          src="{{ URL('assets/images/brands/5.png') }}"
          alt="thereisnoimage"
        />
        <img
          class="img-fluid col-lg-2 col-md-4 col-6"
          src="{{ URL('assets/images/brands/6.png') }}"
          alt="thereisnoimage"
        />
      </div>
    </div>
    <section id="new" class="w-100">
      <div class="row p-0 m-0">
        <div class="one col-lg-4 col-md-12 col-12 p-0">
          <img class="img-fluid" src="{{ URL('assets/images/new/1.jpg') }}" alt="" />
          <div class="details">
            <h2>High quality fabric</h2>
            <button class="text-uppercase">Shop now</button>
          </div>
        </div>
        <div class="one col-lg-4 col-md-12 col-12 p-0">
          <img class="img-fluid" src="{{ URL('assets/images/new/2.jpg') }}" alt="" />
          <div class="details">
            <h2>Clothing Brands At Affordable Prices</h2>
            <button class="text-uppercase">Shop now</button>
          </div>
        </div>
        <div class="one col-lg-4 col-md-12 col-12 p-0">
          <img class="img-fluid" src="{{ URL('assets/images/new/3.jpg') }}" alt="" />
          <div class="details">
            <h2>CloKids is all about being better</h2>
            <button class="text-uppercase">Shop now</button>
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
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/shoes/1.jpg') }}" alt="" />
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
          <img class="img-fluid" src="{{ URL('assets/images/products/shoes/2.jpg') }}" alt="" />
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
          <img class="img-fluid" src="{{ URL('assets/images/products/shoes/3.jpg') }}" alt="" />
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
          <img class="img-fluid" src="{{ URL('assets/images/products/shoes/4.jpg') }}" alt="" />
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
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/Dresses/1.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Dress</h5>
            <h4 class="product-price">$52.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/Dresses/2.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Dress</h5>
            <h4 class="product-price">$52.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/Dresses/3.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Romper</h5>
            <h4 class="product-price">$52.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/Dresses/4.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Romper</h5>
            <h4 class="product-price">$52.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
      </div>
    </section>
    <section id="caps" class="my-5">
      <div class="container text-center mt-5 py-5">
        <h3>Hats & Caps</h3>
        <hr class="mx-auto" style="height: 3px" />
        <p>Here you can check out our new products fair price on CloKids</p>
      </div>
      <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/hats-caps/1.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Cashmere Winter Cap</h5>
            <h4 class="product-price">$90.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/hats-caps/2.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Camouflage Ear Flaps Cap</h5>
            <h4 class="product-price">$79.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/hats-caps/3.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Bunny Ears Cap</h5>
            <h4 class="product-price">$152.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/hats-caps/4.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Koala Cap</h5>
            <h4 class="product-price">$142.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
      </div>
    </section>
    <section id="coats" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>Coats & Jackets</h3>
        <hr class="mx-auto" style="height: 3px" />
        <p>Here you can check out our new products fair price on CloKids</p>
      </div>
      <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/coats-jackets/1.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Rainbow Stripes Ski Jacket</h5>
            <h4 class="product-price">$290.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/coats-jackets/2.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Velvet Floral Winter Parka</h5>
            <h4 class="product-price">$179.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/coats-jackets/3.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Logo Winter Jacket</h5>
            <h4 class="product-price">$252.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid" src="{{ URL('assets/images/products/coats-jackets/4.jpg') }}" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <h5 class="p-name">Colored Pencils Print Jacket</h5>
            <h4 class="product-price">$172.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
      </div>
    </section>
    @endsection;