@extends('layouts.layout')
@section('content')
<section id="blog-home" class="pt-5 mt-5 container">
    <h1 class="fw-blod pt-5">Blogs</h1>
    <hr style="height: 3px" />
  </section>
  <section id="blog-container" class="container pt-5">
    <div class="row">
      <div class="post col-lg-6 col-md-6 col-12">
        <div class="post-img">
          <img class="image-fluid w-100 rounded" src="{{ URL('assets/images/blog/1.jpg') }}" alt="" />
        </div>
        <h3 class="text-center fw-normal pt-3">
          Tips for Working Mothers to Manage Kids Dressing with Work Schedule
        </h3>
        <p class="text-center">on Nov 2, 2021 0 Comnents</p>
      </div>
      <div class="post col-lg-6 col-md-6 col-12">
          <div class="post-img">
            <img class="image-fluid w-100 rounded" src="{{ URL('assets/images/blog/2.jpg') }}" alt="" />
          </div>
          <h3 class="text-center fw-normal pt-3">
              How to teach children to dress themselves: The Ultimate Guide
          </h3>
          <p class="text-center">on Nov 15, 2021 0 Comnents</p>
        </div>
        <div class="post col-lg-6 col-md-6 col-12">
          <div class="post-img">
            <img class="image-fluid w-100 rounded" src="{{ URL('assets/images/blog/3.jpg') }}" alt="" />
          </div>
          <h3 class="text-center fw-normal pt-3">
              Mistakes to avoid while shopping for kids clothing online in India
          </h3>
          <p class="text-center">on Dec 21, 2021 0 Comnents</p>
        </div>
        <div class="post col-lg-6 col-md-6 col-12">
          <div class="post-img">
            <img class="image-fluid w-100 rounded" src="{{ URL('assets/images/blog/4.jpg') }}" alt="" />
          </div>
          <h3 class="text-center fw-normal pt-3">
              How to Store & Organize Kid's Clothing – Ultimate Guide
          </h3>
          <p class="text-center">on Jan 12, 2022 0 Comnents</p>
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
    </div>
  </section>
@endsection