<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CloKids</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
  />
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
    @if (request()->path() === 'shop')
    <link rel="stylesheet" href="{{ url('assets/css/shop.css') }}" />
  @elseif (request()->path() === 'login')
    <link rel="stylesheet" href="{{ url('assets/css/login.css') }}" />
@elseif(request()->path() === 'product')
<link rel="stylesheet" href="{{ url('assets/css/sproduct.css') }}" />
@endif
  </head>
  <body>

     {{ View::make('layouts.header') }}
     @yield('content')
      {{ View::make('layouts.footer') }}

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
    @if (request()->path() === 'shop')
    <script src="{{ url('assets/js/cart.js') }}"></script>
    @elseif(request()->path() === 'product')
    <script>
      let MainImg = document.getElementById("MainImg");
      let smallimg = document.getElementsByClassName("small-img");
     [...smallimg].map(e => e.onclick = function(){MainImg.src = e.src});
   </script>
    @endif
  </body>
</html>
