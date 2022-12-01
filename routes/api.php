<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/test', function (){
    for ($i = 1; $i < 10; $i++)
    {
        $category = \App\Models\CategoryModel::create([
            'title' => fake()->title
        ]);

        for ($j = 1; $j < 10; $j++)
        {
            \App\Models\ProductModel::create([
                'category_id' => $category->id,
                'title' => fake()->title,
                'description' => fake()->text,
            ]);
        }
    }
});

Route::get('/product', [ProductController::class, 'get']);
