@extends('layouts.admin-layout')
@section('title', 'Categories')
@section('content')

<a href="{{route('categories.create')}}" class="header-btn rounded-3 mb-3"
>Add Category</a>
@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif
<table class="table table-bordered">
<table class="table table-bordered">
<thead>
<tr>
<th>Name</th>
<th>Slug</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach ($categories as $category)
<tr>
<td>{{ $category->name }}</td>
<td>{{ $category->slug }}</td>
<td>

<a href="{{ route('categories.edit', $category) }}" class="btn btn-
warning btn-sm">Edit</a>

<form action="{{ route('categories.destroy', $category) }}"
method="POST" class="d-inline">
@csrf @method('DELETE')
<button class="btn text-white rounded-3 color-bg btn-sm btn-sm-hovers" onclick="return
confirm('Delete?')">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
