<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\CartController;

use App\Models\Meal;


Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
return view('about');
});

// Route::get('/meal', function () {
// return view('meal');
// });

Route::get('/details/{id}', function ($id) {
    $meal = Meal::with('category')->findOrFail($id);
    return view('dynamic-meals', compact('meal'));
})->name('meal.details');



Route::middleware('auth')->group(function () {
     Route::resource('categories', CategoryController::class);
     Route::resource('/meals', MealController::class);
});

// Route::get('/profile/edit', function () {
//     return view('profile.edit');
// })->name('profile.edit');

require __DIR__.'/auth.php';

Route::get('/home',[HomeController::class, 'index']) -> name('home');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category.filter');
Route::get('/search',[MealController::class, 'search']) -> name('search');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{meal}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{meal}', [CartController::class, 'remove'])->name('cart.remove');



Route::resource('/categories', CategoryController::class);