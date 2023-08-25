<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleVenteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FournisseurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("article",ArticleController::class);
Route::apiResource("vente",ArticleVenteController::class);
Route::apiResource("fournisseur",FournisseurController::class);
Route::get("categories",[CategorieController::class,"index"]);
Route::post("categorie",[CategorieController::class,"store"]);
Route::put("categorie/{categorie}",[CategorieController::class,"update"]);
Route::get("categorie/{categorie}",[CategorieController::class,"show"]);
Route::delete("categorie",[CategorieController::class,"handleActif"]);