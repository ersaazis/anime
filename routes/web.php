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
Route::get('/{anime}', 'NontonAnimeController@anime')->name('Anime');
Route::get('/{anime}/video/{judul}', 'NontonAnimeController@video')->name('VideoAnime');
Route::get('/{anime}/karakter/{karakter}', 'NontonAnimeController@karakter')->name('KarakterAnime');
Route::get('/genre', 'NontonAnimeController@genre')->name('Genre');
Route::get('/jadwal-release', 'NontonAnimeController@jadwal')->name('JadwalRelease');
Route::get('/cari', 'NontonAnimeController@cari')->name('CariAnime');
