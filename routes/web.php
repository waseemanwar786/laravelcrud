<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('products.index'); //name is the router name which is optional
Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('/products/store',[ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit',[ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}/update',[ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}/delete',[ProductController::class, 'delete'])->name('products.delete');