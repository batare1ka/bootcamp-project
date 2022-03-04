@extends('layouts.layout')
@section('content')
<div id="contact" class="justify-content-center">
  <section id="contact" class="pt-5 mt-5 container text-center">
    <h1 class="fw-blod pt-5">Contact</h1>
    <hr style="height: 3px" />
  </section>
  <div class="container col-sm-5 col-lg-4 py-1 mb-5">
    <form class="needs-validation" id="registrationForm" method="POST" action="{{ route('contactUs.send') }}">
      <label for="exampleInputText1" class="form-label">Full Name</label>
      <div class="input-group mb-2">
        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputText1" name="name" value="{{ old('name') }}"/>
      </div>
      @error('name')
      <span class="error">{{ $message }}</span>
      @enderror
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <div class="input-group mb-2">
        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email') }}"/>
      </div>
      @error('email')
      <span class="error">{{ $message }}</span>
      @enderror
      <label for="phone" class="form-label">Phone</label>
      <div class="input-group mb-2">
        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}"  />
      </div>
      @error('phone')
      <span class="error">{{ $message }}</span>
      @enderror
      <div class="select row">
        <div class="col-6">
          <label for="country" class="form-label">Country</label>
          <div class="input-group mb-2">
            <span class="input-group-text"><i class="fas fa-globe-europe"></i></span>
            <select id="country" class="form-control @error('country') is-invalid @enderror" name="country">
              <option value="">
                Choose...
              </option>
              <option {{ old('country') === 'moldova'? 'selected' : '' }} value="moldova">
                Moldova
              </option>
              <option {{ old('country') === 'russia'? 'selected' : '' }} value="russia">
                Russia
              </option>
              <option {{ old('country') === 'ukraine'? 'selected' : '' }} value="ukraine">
                Ukraine
              </option>
              <option {{ old('country') === 'belarus'? 'selected' : '' }} value="belarus">
                Belarus
              </option>
              <option {{ old('country') === 'kazakhstan'? 'selected' : '' }} value="kazakhstan">
                Kazakhstan
              </option>
            </select>
          </div>
          @if (isset($errors->messages()['country']))
          <span class="error">{{ "The country field is required." }}</span>
          @endif
        </div>
        <div class="col-6">
          <label for="region" class="form-label">Region</label>
          <div class="input-group mb-2">
            <span class="input-group-text"><i class="fas fa-flag"></i></span>
            <select id="region" class="form-control @error('region') is-invalid @enderror" name="region" >
              <option value="">
                Choose...
              </option>
              <option {{ old('region') === 'chisinau'? 'selected' : '' }} value="chisinau">
                Chisinau
              </option>
              <option {{ old('region') === 'causeni'? 'selected' : '' }} value="causeni">
                Causeni
              </option>
              <option {{ old('region') === 'stefan-voda'? 'selected' : '' }} value="stefan-voda">
                Stefan Voda
              </option>
              <option {{ old('region') === 'cahul'? 'selected' : '' }} value="cahul">
                Cahul
              </option>
              <option {{ old('region') === 'tiraspol'? 'selected' : '' }} value="tiraspol">
                Triraspol
              </option>
            </select>
          </div>
          @if (isset($errors->messages()['region']))
          <span class="error">{{ "The region field is required." }}</span>
          @endif
        </div>
      </div>
      <label for="exampleFormControlTextarea1" class="form-label">Message</label>
      <div class="input-group mb-2">
        <span class="input-group-text"><i class="bi bi-chat-right-dots-fill"></i></span>
        <textarea class="form-control @error('message') is-invalid @enderror" id="exampleFormControlTextarea1" name="message" 
          rows="3">{{ old('message') }}</textarea>
      </div>
      @error('message')
      <span class="error">{{ $message }}</span>
      @enderror
      @csrf
      <button type="submit" class="buy-btn mt-4 d-block mx-auto">
        Submit
      </button>
    </form>
  </div>
</div>
@endsection