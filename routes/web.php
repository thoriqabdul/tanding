<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});
Route::get('/home', function () {
    return redirect('/admin');
});

Auth::routes();
Route::match(["GET", "POST"], "/register", function(){
    return redirect('/login');
})->name('register');

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware'=>['auth']], function(){
    Route::get('/', function () {
        return view('admin/landing');
    });
    Route::group(['prefix' => 'team',], function(){
        route::get('/', 'TeamController@index')->name('team.index');
        route::get('/data', 'TeamController@data')->name('team.data');
        route::get('/create', 'TeamController@create')->name('team.create');
        route::post('/store', 'TeamController@store')->name('team.store');
        route::get('/edit{id}', 'TeamController@edit')->name('team.edit');
        route::put('/update{id}', 'TeamController@update')->name('team.update');
        route::delete('/destroy{id}', 'TeamController@destroy')->name('team.destroy');
        route::get('/player/{id}', 'TeamController@player')->name('team.player');
        route::get('/playerlist', 'TeamController@dataPlayer')->name('team.players');
        route::get('/playerCreate', 'TeamController@playerCreate')->name('team.playerCreate');
        route::post('/playerstore', 'TeamController@playerstore')->name('team.playerstore');
        route::get('/playeredit/{id}', 'TeamController@editPlayer')->name('team.editPlayer');
        route::put('/updatePlayer/{id}', 'TeamController@updatePlayer')->name('team.updatePlayer');
        route::delete('/playerDestroy/{id}', 'TeamController@destroyPlayer')->name('team.destroyPlayer');
    });

    Route::group(['prefix'=>'macth'], function(){
        route::get('/', 'MatchController@index')->name('match.index');
        route::get('/data', 'MatchController@data')->name('match.data');
        route::get('/create', 'MatchController@create')->name('match.create');
        route::post('/store', 'MatchController@store')->name('match.store');
        route::get('/edit/{id}', 'MatchController@edit')->name('match.edit');
        route::put('/update/{id}', 'MatchController@update')->name('match.update');
        route::delete('/delete/{id}', 'MatchController@destroy')->name('match.destroy');
        route::get('/score/{id}', 'MatchController@editScore')->name('match.editScore');
        route::get('/list', 'MatchController@playerList')->name('match.playerList');
        route::put('/sotreScore/{id}', 'MatchController@storeScore')->name('match.storeScore');
        route::get('/show/{id}', 'MatchController@detail')->name('match.detail');
    });
});
