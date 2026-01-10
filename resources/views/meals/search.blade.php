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



    <h2 class="text-center my-4">Search results for "{{ $query }}"</h2>

    <div class="row container">
@forelse($meals as $meal)
<div class="col-md-3 mb-4">
    <div class="card h-50">
      <div class="card border border-dark">
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
        @empty
            <p class="text-center">No meals found.</p>
        @endforelse
    </div>

    <div class="text-center mt-3">
    <a href="{{ route('home') }}" class="btn btn-success">
        Back
    </a>
     </div>
@endsection