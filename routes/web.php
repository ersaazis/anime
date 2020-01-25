<?php

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
Route::get('/', 'NontonAnimeController@index')->name('HomePage');
Route::get('/anime', 'NontonAnimeController@semuaAnime')->name('SemuaAnime');
Route::get('/video', 'NontonAnimeController@semuaVideo')->name('SemuaVideo');
Route::get('/anime/{anime}', 'NontonAnimeController@anime')->name('Anime');
Route::get('/anime/{anime}/{judul}', 'NontonAnimeController@video')->name('VideoAnime');
Route::get('/karakter/{karakter}', 'NontonAnimeController@karakter')->name('KarakterAnime');
Route::get('/genre/{genre}', 'NontonAnimeController@genre')->name('Genre');
Route::get('/jadwal-rilis', 'NontonAnimeController@jadwal')->name('JadwalRilis');
Route::get('/cari', 'NontonAnimeController@cari')->name('CariAnime');

Route::middleware(['web', \crocodicstudio\crudbooster\middlewares\CBBackend::class])->group(function () {
    Route::get('/lite', 'NontonAnimeController@lite')->name('LiteMode');
    Route::get('/rating/{id_anime}/{rating}', 'NontonAnimeController@rating')->name('RatingAnime');
    Route::get('/report/{id_video}', 'NontonAnimeController@reportVideo')->name('ReportVideo');
    Route::get('/vote/{tipe}/{id}', 'NontonAnimeController@vote')->name('VoteAnime');
});
