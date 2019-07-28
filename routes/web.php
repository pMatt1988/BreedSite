<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::get('/demo', function() {
   return view('demo');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('dogs/destroy', 'DogController@massDestroy')->name('dogs.massDestroy');

    Route::resource('dogs', 'DogController');

    Route::post('dogs/media', 'DogController@storeMedia')->name('dogs.storeMedia');

    Route::delete('litters/destroy', 'LitterController@massDestroy')->name('litters.massDestroy');

    Route::resource('litters', 'LitterController');

    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');

    Route::resource('content-categories', 'ContentCategoryController');

    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');

    Route::resource('content-tags', 'ContentTagController');

    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');

    Route::resource('content-pages', 'ContentPageController');

    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
});
