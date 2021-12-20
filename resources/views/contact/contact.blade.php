@extends('layouts.layout')
@section('content')
<div id="contact" class="row justify-content-center">
        <section id="contact" class="pt-5 mt-5 container text-center">
          <h1 class="fw-blod pt-5">Contact</h1>
          <hr style="height: 3px" />
        </section>
    <div class="container col-sm-5 col-md-5 col-lg-4 py-2">
      <form class="needs-validation" novalidate id="registrationForm">
          <label for="exampleInputText1" class="form-label">Full Name</label>
          <div class="input-group mb-3">
            <span class="input-group-text"
              ><i class="bi bi-person-fill"></i
            ></span>
            <input
              type="text"
              class="form-control"
              id="exampleInputText1"
              required
            />
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please choose a username.</div>
          </div>
          <label for="exampleInputEmail1" class="form-label"
            >Email address</label
          >
          <div class="input-group mb-3">
            <span class="input-group-text"
              ><i class="bi bi-envelope-fill"></i
            ></span>
            <input
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              required
            />
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please type your email.</div>
          </div>
          <label for="phone" class="form-label">Phone</label>
          <div class="input-group mb-3">
            <span class="input-group-text"
              ><i class="bi bi-telephone-fill"></i
            ></span>
            <input type="number" class="form-control" id="phone" required />
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please type your number.</div>
          </div>
          <label for="exampleFormControlTextarea1" class="form-label"
            >Message</label
          >
          <div class="input-group mb-3">
            <span class="input-group-text"
              ><i class="bi bi-chat-right-dots-fill"></i
            ></span>
            <textarea
              class="form-control"
              id="exampleFormControlTextarea1"
              rows="3"
            ></textarea>
            <div class="valid-feedback">Not required!</div>
          </div>
          <button type="submit" class="buy-btn  mt-4">
            Submit
          </button>
      </form>
    </div>
  </div>
@endsection