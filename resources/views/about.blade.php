@extends('layouts.app')
@section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand  fw-bold nav-font" href="{{asset('home')}}">Resto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 pt-1 fs-5 gap-4">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="{{asset('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{asset('about')}}">About Our Place</a>
        </li>
   
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/home#meals-section') }}" tabindex="-1" aria-disabled="true">Meals</a>
        </li>
      </ul>
      <form class="d-flex" method="GET" action="{{route('search')}}">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn search-btn" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<section>
  <div class="container row">
   
     <div class="col-md-7">
    <img class="img-fluid pt-5   rounded-pill" src="{{asset('images/restaurant.jfif')}}" alt="">
  </div>
   <div class="col-md-1"></div>
  <div class="col-md-4 pt-4 text-about w-100 ">
    <h1 class="fw-bold">About Us – Resto Restaurant</h1>
    <p>Welcome to Resto, your go-to spot for delicious pizza and refreshing drinks. Since opening our doors in 2018, we’ve been dedicated to serving mouthwatering flavors in a fun, relaxed atmosphere.</p>
    <h4>	🍕 Our Pizza: Handcrafted with fresh dough, rich sauces, and premium toppings — from classic Margherita to bold signature creations.
      <br><br>
• 	🥤 Our Drinks: A wide selection of chilled sodas, fresh juices, and creative mocktails to pair perfectly with every slice.
<br><br>
• 	🌟 Our Promise: Quality ingredients, friendly service, and a cozy space where friends and families can enjoy great food together.
<br><br>
• 	🎉 Our Vibe: Whether it’s a casual lunch, a late-night craving, or a weekend hangout, Resto is the place to be.
<br><br><br>
<span class="fw-bold">At Resto, we don’t just serve pizza — we serve happiness, one slice at a time.</span></h4>
<br><br>
<a href="{{ route('home') }}" class="btn btn-success">
        Back
    </a>
    <br><br>
  </div>
  </div>
 
</section>
    

@endsection