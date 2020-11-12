<?php

Route::group(['prefix' => 'a', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', 'BaseController@dashboard')->name('dashboard');
    Route::resource('events', 'EventController');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('profiles', 'ProfileController');
    Route::resource('categories', 'CategoryController');
    Route::get('/categories/list_data', 'CategoryController@list_data')->name('categories.list');
    Route::resource('registrations', 'RegistrationController');
    Route::get('/gallery', 'GalleryController@index');
    Route::get('/gallery/create', 'GalleryController@create');
    Route::post('/gallery/images-save', 'GalleryController@store');
    Route::post('/gallery/images-delete', 'GalleryController@destroy');
    Route::delete('/gallery/{id}', 'GalleryController@delete')->name('image-delete');
});

Route::group(['prefix' => 'participants', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/re-registrations', 'ReRegistrationController@index')->name('re-registrations.index');
    Route::get('/re-registrations/{registration}/payment-upload', 'ReRegistrationController@paymentUpload')->name('payment-upload');
    Route::patch('/re-registrations/{registration}', 'ReRegistrationController@paymentUploadStore')->name('payment-upload.store');
});

Route::group(['namespace' => 'Landing'], function () {
    Route::get('/', 'BaseController@home')->name('event');
    Route::get('/{slug}', 'BaseController@eventDetail')->name('event.show');
    Route::get('/event-gallery', 'BaseController@eventGallery')->name('event-gallery');
    Route::get('/registration/{slug}', 'BaseController@eventRegistration')->name('event-registration.show');
    Route::post('/registration', 'BaseController@eventRegistrationPost')->name('event-registration.store');
});

require __DIR__.'/auth.php';
