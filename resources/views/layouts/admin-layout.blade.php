<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>@yield('title', 'Admin Dashboard')</title>
<!-- Bootstrap 5 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"rel="stylesheet">
<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container ">
<div class="row ">
<!-- Sidebar -->
<nav class="col-md-3 d-md-block bg-success sidebar py-4">
<h4 class="text-center color-font fw-bold">Restaurant Admin</h4>
<ul class="nav flex-column px-3">

<li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link admin-color fw-bold color-font ">Dashboard</a></li>

<li class="nav-item"><a href="{{ route('categories.index') }}"class="nav-link admin-color fw-bold color-font">Categories</a></li>
<li class="nav-item"><a href="{{ route('meals.index') }}"class="nav-link fw-bold admin-color color-font">Meals</a></li>
<li class="nav-item">
<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="btn admin-btn rounded-3 mt-3">Logout</button>
</form>
</li>
</ul>
</nav>
<!-- Content -->
<main class="col-md-9 py-4">
@yield('content')
</main>
</div>
</div> 
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

