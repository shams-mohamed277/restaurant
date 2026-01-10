@extends('layouts.app')

@section('content')
 <div class="row">
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

  </div>
      </div>
    </div>
</div>
 </div>
@endforelse
@endsection