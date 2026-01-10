<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;



class CartController extends Controller
{
    public function index()
{
    $cart = session()->get('cart', []);

    $subtotal = 0;
    foreach($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    $taxRate = 0.14; 
    $tax = $subtotal * $taxRate;
    $grandTotal = $subtotal + $tax;

    return view('cart.index', compact('cart', 'subtotal', 'tax', 'grandTotal'));
}

    public function add(Request $request, Meal $meal)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$meal->id])) {
            $cart[$meal->id]['quantity']++;
        } else {
            $cart[$meal->id] = [
                "name" => $meal->name,
                "quantity" => 1,
                "price" => $meal->price,
                "image" => $meal->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Meal added to cart!');
    }

    public function remove(Meal $meal)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$meal->id])) {
            unset($cart[$meal->id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Meal removed from cart!');
    }
}
