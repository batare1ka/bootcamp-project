@extends('layouts.layout');
@section('content')
<section id="about" class="pt-5 mt-5 container">
    <h1 class="fw-blod pt-5">About us</h1>
    <hr style="height: 3px" />
  </section>
  <section id="history" class="py-4 my-4 container">
    <div class="row mx-auto container-fluid">
      <div class="col-sm-6">
        <h2>Our history</h2>
        <hr style="height: 3px" />
        <p class="fs-5 lh-sm">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque
          laudantium voluptates ab distinctio ipsa accusamus mollitia magnam
          eveniet velit amet soluta, molestias deleniti neque. Placeat qui
          excepturi adipisci, dicta maxime pariatur! Tempore vitae eum, eius
          totam in maxime omnis magnam?
        </p>
        <p class="fs-6 lh-sm">
          <i class="bi bi-check-circle-fill me-2"></i>Lorem ipsum dolor sit
          amet consectetur adipisicing elit. Laborum velit repellendus nihil.
          Exercitationem, facilis obcaecati?
        </p>
        <p class="fs-6 lh-sm">
          <i class="bi bi-check-circle-fill me-2"></i>Lorem ipsum dolor sit
          amet consectetur adipisicing elit. Laborum velit repellendus nihil.
          Exercitationem, facilis obcaecati?
        </p>
        <p class="fs-6 lh-sm">
          <i class="bi bi-check-circle-fill me-2"></i>Lorem ipsum dolor sit
          amet consectetur adipisicing elit. Laborum velit repellendus nihil.
          Exercitationem, facilis obcaecati?
        </p>
      </div>
      <img
        class="col-sm-6 img-fluid rounded"
        src="{{ URL('assets/images/about/history-img.jpg') }}"
        alt="img"
      />
    </div>
  </section>

  <div class="about__banner my-5 py-5">
    <div class="about__banner-wrapper container-lg">
      <div class="abour__banner-item">
        <span>4500</span>
        <p>Happy Clients</p>
      </div>
      <div class="abour__banner-item">
        <span>3000</span>
        <p>Total Brand</p>
      </div>
      <div class="abour__banner-item">
        <span>5000</span>
        <p>Total Selling</p>
      </div>
      <div class="abour__banner-item">
        <span>3500</span>
        <p>Total members</p>
      </div>
    </div>
  </div>
  <section class="personal">
    <div class="container text-center">
      <h2>Meet Our Team</h2>
      <hr style="height: 3px" />
      <p class="fs-5">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit porro
        adipisci asperiores ad tempora a dolorum ullam animi repudiandae
        veniam.
      </p>
      <div class="row mt-5 gx-5">
        <div class="col-sm-3">
          <img class="img-fluid" src="{{ URL('assets/images/about/employee.jpg') }}" alt="" />
          <p class="mt-3 mb-0">Andro Smith</p>
          <p class="fs-5">Team Leader</p>
        </div>
        <div class="col-sm-3">
          <img class="img-fluid" src="{{ URL('assets/images/about/employee1.jpg') }}" alt="" />
          <p class="mt-3 mb-0">Jonathan Doe</p>
          <p class="fs-5">Senio Officer</p>
        </div>
        <div class="col-sm-3">
          <img class="img-fluid" src="{{ URL('assets/images/about/employee3.jpg') }}" alt="" />
          <p class="mt-3 mb-0">Samia Jasse</p>
          <p class="fs-5">Advisor of Company</p>
        </div>
        <div class="col-sm-3">
          <img class="img-fluid" src="{{ URL('assets/images/about/employee4.jpg') }}" alt="" />
          <p class="mt-3 mb-0">Jasica Mari</p>
          <p class="fs-5">Advisor of Company</p>
        </div>
      </div>
    </div>
  </section>
  <div class="about__banner2 my-5 py-5">
    <div class="container text-center">
      <h2 class="text-light">Subscribe to out newsletter</h2>
      <p class="text-light fs-5">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere ullam
      </p>
    </div>
    <div class="input text-center">
      <input type="text" name="subscribe" id="" placeholder="keword search" />
      <button class="btn">Subscribe</button>
    </div>
  </div>
  <div class="container my-5 py-5">
    <div class="about__items-wrapper fs-5">
      <div class="about__items text-center">
        <i class="bi bi-truck fs-2"></i>
        <p class="mb-0">Free Shipping Worldwide</p>
        <p class="fs-6">On order over 150$ - 7 week</p>
      </div>
      <div class="about__items text-center">
        <i class="bi bi-cash fs-2"></i>
        <p class="mb-0">Money Back Guarantee</p>
        <p class="fs-6">Send within 30 days</p>
      </div>
      <div class="about__items text-center">
        <i class="bi bi-clock fs-2"></i>
        <p class="mb-0">24/7 Customer Services</p>
        <p class="fs-6">Call us 24/7 at 4612-54</p>
      </div>
    </div>
  </div>
@endsection;