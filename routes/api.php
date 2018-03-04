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
    // 获取所有material数据
    Route::get('/materials', 'MaterialsController@show');
    // 新增一条material数据
    Route::post('/materials', 'MaterialsController@create');
    // 查询一条material数据
    Route::get('/materials/{id}', 'MaterialsController@query')->where(['id' => '[0-9]+']);
    // 更新一条material数据
    Route::put('/materials/{id}', 'MaterialsController@update')->where(['id' => '[0-9]+']);
    // 删除一条material数据
    Route::delete('materials/{id}', 'MaterialsController@remove')->where(['id' => '[0-9]+']);
});
