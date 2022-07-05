<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $cachedBlog = Redis::get('user_name');
    if(isset($cachedBlog)) {
        Redis::set('user_name', 'prem');
        Redis::del('user_name');
        return Redis::del('user_name');
    }else {
        $blog = 'saro';
        Redis::set('user_name', 'saro');
        return true;
    }
});
