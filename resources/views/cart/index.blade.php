@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="color-font fw-bold">Your Cart</h2>
    @if(!empty($cart))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Meal</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button  class="btn text-white color-bg btn-sm btn-sm-hovers">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class=" mt-4">
            <p><strong class="color-font">Subtotal:</strong> ${{ number_format($subtotal, 2) }}</p>
            <p><strong class="color-font">Tax (14%):</strong> ${{ number_format($tax, 2) }}</p>
            <p><strong class="color-font">Grand Total:</strong> ${{ number_format($grandTotal, 2) }}</p>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
    <a href="{{ route('home') }}" class="header-btn rounded-3  mt-3">Back to Menu</a>
</div>
@endsection