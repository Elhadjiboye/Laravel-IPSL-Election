<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\PosteController;
use App\Http\Controllers\admin\CandidatController;
use App\Http\Controllers\admin\ElecteurController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ImportElecteurController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home-electeur', function () {
    return view('electeur.home');
})->middleware(['auth', 'verified'])->name('Compte_electeur');

Route::get('/home_admin', function () {
    return view('admin.home');
})->middleware(['auth', 'verified'])->name('Compte_admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/prphp artisan serve
ofile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/home_admin', [AdminController::class, 'compteadmin'])->name('Compte_admin');

    Route::prefix('poste')->group(function (){
        Route::get('/', [PosteController::class, 'index_poste'])->name('poste.index_poste');
        Route::get('/create_poste', [PosteController::class, 'create_poste'])->name('poste.create_poste');
        Route::post('/create_poste', [PosteController::class, 'store_poste'])->name('poste.store_poste');
        Route::get('/edit_poste/{poste}', [PosteController::class, 'edit_poste'])->name('poste.edit_poste');
        Route::put('/update_poste/{poste}', [PosteController::class, 'update_poste'])->name('poste.update_poste');
        Route::get('/delete_poste/{poste}', [PosteController::class, 'delete_poste'])->name('poste.delete_poste');
        Route::delete('/delete_poste/{poste}', [PosteController::class, 'delete'])->name('poste.delete');


     });

    Route::prefix('candidat')->group(function (){
        Route::get('/', [CandidatController::class, 'index_candidat'])->name('candidat.index_candidat');
        Route::get('/create_candidat', [CandidatController::class, 'create_candidat'])->name('candidat.create_candidat');
        Route::post('/create_candidat', [CandidatController::class, 'store_candidat'])->name('candidat.store_candidat');
        Route::get('/edit_candidat/{candidat}', [CandidatController::class, 'edit_candidat'])->name('candidat.edit_candidat');
        Route::put('/update_candidat/{candidat}', [CandidatController::class, 'update_candidat'])->name('candidat.update_candidat');
        Route::get('/delete_candidat/{candidat}', [CandidatController::class, 'delete_candidat'])->name('candidat.delete_candidat');
        Route::delete('/delete_candidat/{candidat}', [CandidatController::class, 'delete'])->name('candidat.delete');

          });
    
    Route::prefix('electeur')->group(function (){
        Route::get('/', [ElecteurController::class, 'index_electeur'])->name('electeur.index_electeur');
        Route::get('/create_electeur', [ElecteurController::class, 'create_electeur'])->name('electeur.create_electeur');
        Route::post('/create_electeur', [ElecteurController::class, 'store_electeur'])->name('electeur.store_electeur');
        Route::get('/edit_electeur/{electeur}', [ElecteurController::class, 'edit_electeur'])->name('electeur.edit_electeur');
        Route::put('/update_electeur/{electeur}', [ElecteurController::class, 'update_electeur'])->name('electeur.update_electeur');
        Route::get('/delete_electeur/{electeur}', [ElecteurController::class, 'delete_electeur'])->name('electeur.delete_electeur');
        Route::delete('/delete_electeur/{electeur}', [ElecteurController::class, 'delete'])->name('electeur.delete');
        Route::post('/', [ElecteurController::class, 'import'])->name('electeur.excel.import');

        });
});

require __DIR__.'/auth.php';
