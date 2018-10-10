<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:09
 */
Route::get('/users/get-all','Admin\DatatableController@getAllUsers')->name('dt_all_users');
