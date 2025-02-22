<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'create'])->name('product.create');
Route::post('/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/products', [ProductController::class, 'index'])->name('all.products'); // New route
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit'); // New route
Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update'); // New route
Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete'); // New route
?>
