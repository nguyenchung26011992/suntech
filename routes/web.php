<?php
Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'AboutController@index')->name('about.index');
