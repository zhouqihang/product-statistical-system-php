<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$environment = env('APP_ENV', 'prod');
$middleware = [];
if ($environment === 'prod') {
    array_push($middleware, 'auth:api');
}


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware($middleware)->group(function () {
    // 获取所有materials数据
    Route::get('/materials', 'MaterialsController@show');
    // 新增一条materials数据
    Route::post('/materials', 'MaterialsController@create');
});
