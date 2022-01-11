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
    <div class="row mx-auto col-md-9 col-sm-8" id="product-data">

      <x-prod-item :products="$products" />

      <div class="ajax-load text center">
        <img class="preloader" src="{{   \Illuminate\Support\Facades\Storage::url("preloader.gif") }}" alt="">
      </div>
    </div>
  </div>
</section>
<script>
  function loadMoreData(page){
      
  var xhttp = new XMLHttpRequest();
  
   xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText).html;
        if(data == ''){
          let div = document.createElement('div');
          div.classList.add("no-more");
          div.style.textAlign = "center";
          div.innerHTML = "No more records found";

          document.querySelector('#product-data').insertBefore(div, document.querySelector('.ajax-load'));
          setInterval(() => {
            document.querySelector('.no-more').remove();
          }, 2000);
        }else {
          document.querySelector('.ajax-load').insertAdjacentHTML( 'beforebegin', data );
        }
        setTimeout(() => {
          document.querySelector('.ajax-load').style.display = 'none';
        }, 500);
        
        
        
        }
     };
          xhttp.onprogress = function(){
            document.querySelector('.ajax-load').style.display = 'block';
            }

          xhttp.open("GET", window.location.search ? window.location.search + '&page=' + page : '?page=' + page, true);
          xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
          xhttp.send();


 }
 let page = 1;
 document.addEventListener('scroll', function(e) {
  if(window.scrollY + window.innerHeight >= document.documentElement.scrollHeight){
    page++;
    loadMoreData(page);

  }
 });
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