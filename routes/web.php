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
// go
Route::get('/anime/{anime}', 'NontonAnimeController@anime')->name('Anime');
// go
Route::get('/anime/{anime}/{judul}', 'NontonAnimeController@video')->name('VideoAnime');
// go
Route::get('/karakter/{karakter}', 'NontonAnimeController@karakter')->name('KarakterAnime');
// go
Route::get('/genre/{genre}', 'NontonAnimeController@genre')->name('Genre');
// go
Route::get('/jadwal-rilis', 'NontonAnimeController@jadwal')->name('JadwalRelease');
// go
Route::post('/cari', 'NontonAnimeController@cari')->name('CariAnime');

Route::middleware(['web', \crocodicstudio\crudbooster\middlewares\CBBackend::class])->group(function () {
// go
    Route::get('/rating/{id_anime}/{rating}', 'NontonAnimeController@rating')->name('RatingAnime');
// go
    Route::get('/vote/{tipe}/{id}', 'NontonAnimeController@vote')->name('VoteAnime');
});
