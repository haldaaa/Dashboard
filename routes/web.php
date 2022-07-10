<?php

use App\Http\Controllers\CommandeController;
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
    return view('myindex');
});


Route::get('/myindex', function() {
    return view('myindex');

})->name("index");



Route::get('/commerciaux' , 'CommerciauxController@index') ->name('commerciaux');

Route::get('/clients', 'ClientsController@index') ->name('client');

Route::get('produits', 'ProduitsController@index') ->name('produits');




Route::get('/commande', 'CommandeController@index') ->name('commande');

Route::post('/commande', 'CommandeController@store')->name('commande-store');

Route::get('/commande-liste', 'CommandeController@liste')->name('commande-liste');

Route::get('/test', 'CommandeController@coucou');
