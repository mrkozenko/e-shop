<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

//Авторизація та реєстрація користувача
Auth::routes();

//Взаємодія з функціоналом товару
Route::controller(\App\Http\Controllers\ItemController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/item/{item}', 'details')->name('details');
    Route::get('/items/{category_id}/', 'categories')->name('categories');
    Route::post('/search/','search')->name('search');
});

//Взаємодія з кошиком
Route::controller(\App\Http\Controllers\CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('CartIndex');
    Route::post('/add-to-cart', 'addToCart')->name('addToCart');
    Route::get('/delete-from-cart/{id}', 'deleteFromCart')->name('deleteFromCart');
});

//Взаємодія із замовленнями для користувача
Route::controller(\App\Http\Controllers\OrderController::class)->group(function () {
    Route::post('/addOrder/', 'addOrder')->name('addOrder');
    Route::get('/orders/','index')->name('orders.show');
    Route::get('/home', 'index')->name('home');
});


//Доступ до адмін панелі
Route::get('/admin_panel/',[\App\Http\Controllers\AdminController::class,'index'])->name('panel_controll');


//CRUD categories
Route::controller(\App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('/categories/','index')->name('crud_categories');
    Route::post('/add_category/',  'add_category')->name('add_category');
    Route::get('/add_new_category/', 'add_new_category_view')->name('show_add_category');
    Route::post('/update_category/',  'update_category')->name('update_category');
    Route::get('/update_category_show/{category}',  'show_update')->name('show_update');
    Route::get('/delete_category/{category}',  'delete_category')->name('delete_category');
});


//Взаємодія із замовленнями зі сторони адміністратора
Route::controller(\App\Http\Controllers\OrderController::class)->group(function () {
    Route::get('/show_list_orders/','show_list')->name('show_list_admin_orders');
    Route::get('/submit_order/{order}', 'update_status_done')->name('submit_order');
});

Route::controller(\App\Http\Controllers\ImageItemController::class)->group(function () {
    Route::get('/show_images/','index')->name('show_images');
    Route::get('/add_new_image/','addImage')->name('addImage');
    Route::post('/storeImage/','storeImage')->name('storeImage');
    Route::get('/delete_image/{image}','deleteImage')->name('deleteImage');
    Route::get('/update_img/{image}','update_img')->name('update_img');
    Route::post('/update_img/','update_image')->name('updateImage');



});
Route::controller(\App\Http\Controllers\ItemController::class)->group(function () {
    Route::get('/show_items_all/', 'index_admin')->name('index_admin');
    Route::get('/delete_item/{item}/','delete')->name('delete_item');
    Route::get('/create_item/', 'create_item')->name('create_item');
    Route::post('/submit_create_item/', 'create_new_item')->name('submit_create_item');
    Route::get('/update_view_item/{item}','update_view')->name('update_view');
    Route::post('/submit_update_item/', 'update_new_item')->name('submit_update_item');



});


