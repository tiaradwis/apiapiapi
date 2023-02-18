<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CommentArticleController;
use App\Http\Controllers\CommentVideoController;
use App\Http\Controllers\FavoritedArticleController;
use App\Http\Controllers\FavoritedVideoController;
use App\Http\Controllers\CategoryController;

Route::get('/admin',[AdminController::class, 'index']);
Route::post('/admin',[AdminController::class, 'store']);
Route::put('/admin/{id}',[AdminController::class, 'update']);
Route::get('/admin/{id}',[AdminController::class, 'show']);
Route::delete('/admin/{id}',[AdminController::class, 'destroy']);

Route::get('/article',[ArticleController::class, 'index']);
Route::post('/article',[ArticleController::class, 'store']);
Route::put('/article/{id}',[ArticleController::class, 'update']);
Route::get('/article/{id}',[ArticleController::class, 'show']);
Route::get('/article/search/{title}',[ArticleController::class, 'search']);
Route::delete('/article/{id}',[ArticleController::class, 'destroy']);

Route::get('/video',[VideoController::class, 'index']);
Route::post('/video',[VideoController::class, 'store']);
Route::put('/video/{id}',[VideoController::class, 'update']);
Route::get('/video/{id}',[VideoController::class, 'show']);
Route::get('/video/search/{title}',[VideoController::class, 'search']);
Route::delete('/video/{id}',[VideoController::class, 'destroy']);

Route::get('/notification',[NotificationController::class, 'index']);
Route::post('/notification',[NotificationController::class, 'store']);
Route::get('/notification/{id}',[NotificationController::class, 'show']);

Route::get('/commentArticle',[CommentArticleController::class, 'index']);
Route::post('/commentArticle',[CommentArticleController::class, 'store']);
Route::get('/commentArticle/{id}',[CommentArticleController::class, 'show']);
Route::delete('/commentArticle/{id}',[CommentArticleController::class, 'destroy']);

Route::get('/commentVideo',[CommentVideoController::class, 'index']);
Route::post('/commentVideo',[CommentVideoController::class, 'store']);
Route::get('/commentVideo/{id}',[CommentVideoController::class, 'show']);
Route::delete('/commentVideo/{id}',[CommentVideoController::class, 'destroy']);

Route::get('/favoritedArticle',[FavoritedArticleController::class, 'index']);
Route::post('/favoritedArticle',[FavoritedArticleController::class, 'store']);
Route::get('/favoritedArticle/{id}',[FavoritedArticleController::class, 'show']);
Route::delete('/favoritedArticle/{id}',[FavoritedArticleController::class, 'destroy']);

Route::get('/favoritedVideo',[FavoritedVideoController::class, 'index']);
Route::post('/favoritedVideo',[FavoritedVideoController::class, 'store']);
Route::get('/favoritedVideo/{id}',[FavoritedVideoController::class, 'show']);
Route::delete('/favoritedVideo/{id}',[FavoritedVideoController::class, 'destroy']);

Route::get('/category',[CategoryController::class, 'index']);
Route::post('/category',[CategoryController::class, 'store']);
Route::put('/category/{id}',[CategoryController::class, 'update']);
Route::get('/category/{id}',[CategoryController::class, 'show']);
Route::delete('/category/{id}',[CategoryController::class, 'destroy']);