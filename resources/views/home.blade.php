@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold nav-font" href="{{route('home')}}">Resto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 pt-1 fs-5 gap-4">
        <li class="nav-item">
          <a class="nav-link active text-white" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{asset('about')}}">About Our Place</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#meals-section">Meals</a>
        </li>
      </ul>

      <!-- Search + Cart جنب بعض -->
      <div class="d-flex align-items-center">
        <form class="d-flex me-3" method="GET" action="{{route('search')}}">
          <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
          <button class="btn search-btn text-white" type="submit">Search</button>
        </form>

        <a class="btn search-btn position-relative text-white fw-bold" href="{{ route('cart.index') }}">
          Preview your Cart
          @if(session('cart') && count(session('cart')) > 0)
            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
              {{ count(session('cart')) }}
            </span>
          @endif
        </a>
      </div>
    </div>
  </div>
</nav>
<header class="header">
  <img src="{{ asset('images/restaurant.jfif') }}" alt="">
  <div class="overlay">
    <h1 class="text-success fs-1 fw-bold">Welcome To <span class="nav-font fs-1 ">Resto</span> Place</h1>
    <p>Taste the joy of fresh flavors — where every meal feels like home</p>
    <a href="#meals-section" class="btn header-btn fw-bold">Discover Our Meals</a>
  </div>
</header>
<div class="container-fluid " id="meals-section">
  <div class="center-wrapper">
    <h2 class="text-center my-4 pt-4 colored-line">Our Menu</h2>
  </div>

<div class="text-center mb-4">
@foreach($categories as $category)

<a href="{{ route('category.filter', $category->id) }}" class="btn btn-outline-dark m-1">

{{ $category->name }}
</a>
@endforeach

<a href="{{ route('home') }}" class="btn btn-outline-secondary m-1">Show All</a>

</div>
<div class="row">
@forelse($meals as $meal)
<div class="col-md-3 mb-4">
    <div class="card h-50">
      <div class="card border border-success">
@if($meal->image)

<img src="{{ asset('storage/' . $meal->image) }}" class="card-img-top h-100" alt="{{ $meal->name }}">

@endif

  <div class="card-body">
<h5 class="card-title fw-bold fs-3">{{ $meal->name }} <span class="fs-5 fw-bold px-4 color-font">${{ number_format($meal->price, 2) }}</span></h5>
<p class="card-text">{{ Str::limit($meal->description, 100) }}</p>


<p class="bg-about text-white px-3 py-1 rounded-3 fw-bold text-center d-inline-block mx-auto">
    {{ $meal->category->name }}
</p>
<form action="{{ route('cart.add', $meal->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-outline-success w-100">Add to Cart</button>
</form>
<a href="{{ route('meal.details', $meal->id) }}" class="btn btn-outline-success w-100 mt-2">Details</a>
</div>
</div>

</div>
</div> 
@empty
<p class="text-center">No meals available for this category.</p>
@endforelse
</div>
</div> 
<footer class="footer mt-5 bg-success">
  <div class="container text-center py-4">
    <h4 class="mb-2">Gourmet Haven</h4>
    <p>123 Culinary Street, Foodville</p>
    <p>Open Tuesday - Sunday, 11am - 10pm</p>

    <div class="social-icons my-3">
      <a href="#" class="mx-2 text-white"><i class="fa-brands fa-facebook-f"></i></a>
      <a href="#" class="mx-2 text-white"><i class="fa-brands fa-instagram"></i></a>
      <a href="#" class="mx-2 text-white"><i class="fa-brands fa-twitter"></i></a>
    </div>

    <p class="small mb-0">&copy; 2026 Gourmet Haven. All rights reserved.</p>
  </div>
</footer>

@endsection