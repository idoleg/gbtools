<?php


$this->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/login', 'Auth\LoginController@login');
$this->post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/', 'ActsController@index')->name('');

    Route::get('/acts', 'ActsController@index')->name('acts.index');

    Route::get('/acts/create', 'ActsController@showCreateForm')->name('acts.create');
    Route::post('/acts/create', 'ActsController@create');

    Route::get('/acts/{id}', 'ActsController@view')->name('acts.view');
    Route::get('/acts/{id}/print', 'ActsController@print')->name('acts.print');

});


Route::get('/share/', 'ActsController@share')->name('share');



