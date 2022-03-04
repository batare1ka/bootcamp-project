@extends('layouts.layout')
@section('content')
<div id="login">
    <div class="container col col-12 mt-5 py-5">
        <form method="POST" action="/login" id="request-form">
            @csrf
            <div class="field-email shadow-lg active">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" required name="email" />
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="field-password shadow-lg innactive">
                <i class="fas fa-key"></i>
                <input type="password" placeholder="Password" required name="password" />
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="field-finish shadow-lg innactive">
                <i class="fas fa-heart"></i>
                <button type="submit" class="register-btn">Log in</button>
                <i class="fas fa-heart"></i>
            </div>
        </form>
        @foreach ($errors->all() as $error)
        <li class="text-center fs-6 text-danger mb-0 register__error">{{ $error }}</li>
        @endforeach
    </div>
</div>
@endsection