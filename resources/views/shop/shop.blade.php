@extends('layouts.layout')
@section('content')
<section id="featured" class="my-5 py-5">
  <div class="container mt-5 py-4">
    <h2 class="fw-bold">Top Products</h2>
    <hr style="height: 3px" />
    <p>Here you can check out our new products fair price on CloKids</p>
  </div>
  <div class="container row mx-auto">
    <div class="filter col-md-3 col-sm-4">
      <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
              aria-controls="panelsStayOpen-collapseOne">
              Age
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show fs-6"
            aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  11 years
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                  12 years
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
              aria-controls="panelsStayOpen-collapseTwo">
              Designer
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse show fs-6 collapse"
            aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
              @foreach ($brands as $brand)
              <div class="form-check">
                <input class="form-check-input brand" type="checkbox" value="" id="flexCheckDefault{{ $brand['id'] }}"
                  {{ $filter['brand']==$brand['id']? 'checked' :''}}>
                <label class="form-check-label" for="flexCheckDefault{{ $brand['id'] }}">
                  {{ $brand['name']}}
                </label>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true"
              aria-controls="panelsStayOpen-collapseThree">
              Product Type
            </button>
          </h2>
          <div id="panelsStayOpen-collapseThree" class="accordion-collapse show fs-6 collapse"
            aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="3" id="flexRadioDefault5">
                <label class="form-check-label" for="flexRadioDefault5">
                  Jackets
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="3" id="flexRadioDefault6">
                <label class="form-check-label" for="flexRadioDefault6">
                  Sweaters
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true"
              aria-controls="panelsStayOpen-collapseFour">
              Color
            </button>
          </h2>
          <div id="panelsStayOpen-collapseFour" class="accordion-collapse show fs-6 collapse"
            aria-labelledby="panelsStayOpen-headingFour">
            <div class="accordion-body">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="3" id="flexRadioDefault5">
                <label class="form-check-label" for="flexRadioDefault5">
                  Black
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="3" id="flexRadioDefault6">
                <label class="form-check-label" for="flexRadioDefault6">
                  White
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mx-auto col-md-9 col-sm-8">
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
      {{ $products->links() }}
    </div>
  </div>
</section>
<script>
  (function(){

  let check = document.querySelectorAll(".brand");
   check.forEach(element => {
     element.addEventListener("click", function (event) {
      id = window.location.href.match(/^.*=(\d+)$/);
        elId = element.id.match(/^[A-Za-z]*(\d+)$/)||'';
        
      if(element.checked){
       
        if(window.location.href.match(/^.*([\&\?\d*]brand=\w*)$/)){
         
          window.location.href = window.location.href.substring(0, window.location.href.length - elId.length) + "=" + elId[1];
        }else if(window.location.href.match(/^.*(\?\w+=\w*)$/)){
          window.location.href = window.location.href + "&brand=" + elId[1]
        }else{
          window.location.href = window.location.href + "?brand=" + elId[1]
        }
        
       
        
        
      }else{
        window.location.href = window.location.href.substring(0, window.location.href.length - id[1].length) + "0";
      }
   })
   

  })
 
  
})();


</script>
@endsection