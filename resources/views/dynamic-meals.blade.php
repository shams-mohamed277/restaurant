@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand  fw-bold nav-font" href="{{route('home')}}">Resto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 pt-1 fs-5 gap-4">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{asset('about')}}">About Our Place</a>
        </li>
   
        <li class="nav-item">
          <a class="nav-link text-white" href="#meals-section" tabindex="-1" aria-disabled="true">Meals</a>
        </li>
      </ul>
      <form class="d-flex" method="GET" action="{{route('search')}}">
        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
        <button class="btn search-btn" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>



<div class="container my-5 row">
    <div class="col-md-2"></div>
        <div class="col-md-5">
        @if($meal->image)
            <img src="{{ asset('storage/' . $meal->image) }}" class="img-fluid   rounded-5" alt="{{ $meal->name }}">
        @endif
    </div>

    <div class="col-md-1"></div>

        
        <div class="col-md-4 pt-4">
            <h2 class="fs-1 fw-bold">{{ $meal->name }}</h2>
            <p class="fs-6">{{ $meal->description }}</p>
            <p class="fs-4"><strong">Price:</strong> ${{ number_format($meal->price, 2) }}</p>
            <p><strong class="fs-6">Category:</strong> {{ $meal->category->name }}</p>

            @if($meal->ingredients)
                <h4 class="fw-bold">Ingredients</h4>
                <p>{{ $meal->ingredients }}</p>
            @endif

            @if($meal->details)
                <h4 class="fw-bold">Details</h4>
                <p>{{ $meal->details }}</p>
            @endif

            <a href="" class="btn btn-outline-success w-50">Add to Cart</a>
            <a href="{{ route('home') }}" class="btn btn-outline-danger w-50 mt-3">Back to Menu</a>
        </div>
    </div>
@endsection