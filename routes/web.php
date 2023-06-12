<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\PraticienController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\MedicamentController;
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
    return view('home');
});

Route::get('/login', [VisiteurController::class,'getLogin']);
Route::post('/signIn', [VisiteurController::class,'signIn']);
Route::get('/logout', [VisiteurController::class,'signOut']);

Route::get('/listePraticiens', [PraticienController::class,'listerPraticiens']);
Route::get('/listeSpe/{id}', [SpecialiteController::class,'SpebyID']);
Route::get('/supprSpe/{id}', [SpecialiteController::class,'suppr']);
Route::get('/modifSpe/{id}', [SpecialiteController::class,'modifSpe']);
Route::get('/listeMed/', [MedicamentController::class,'listeMed']);
Route::get('/SansPra/', [MedicamentController::class,'MedicamentSansPraticien']);

Route::post('/postListePraticien',
    array(
        'uses'=> 'App\Http\Controllers\MedicamentController@ListePraticienParMedicament',
        'as'=> 'postListePraticien',
    )
);

Route::post('/postModifSpe',
    array(
        'uses'=> 'App\Http\Controllers\SpecialiteController@postModifSpe',
        'as'=> 'postModifSpe',
    )
);

Route::post('/postAjouterSpe',
    array(
        'uses'=> 'App\Http\Controllers\SpecialiteController@postAjout',
        'as'=> 'postAjout',
    )
);

Route::post('/postSearch',
    array(
        'uses'=> 'App\Http\Controllers\PraticienController@postSearch',
        'as'=> 'postSearch',
    )
);
