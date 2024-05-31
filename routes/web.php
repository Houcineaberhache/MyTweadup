<?php

use App\Http\Controllers\PaiementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\GroupesController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FormateurController ;
use App\Http\Controllers\SeanceController ;
use App\Http\Controllers\DepenceController ;
use App\Http\Controllers\PDFController ;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Groupe;
use App\Models\Formation;

// Admin's routes 
    Route::get('/admin',[AdminController::class,'index'])->name('admins.index');

// pdf"s routes 
    Route::get('/pdf', function () {
        return view('pdf2');
    })->name('pdf.index');
    Route::get('/pdf/{id}', [PDFController::class, 'generatePDF'])->name('pdf.generate');
// Calendar routes 
Route::middleware(AdminMiddleware::class)->group(function () {
Route::get('/fullcalender', [FullCalenderController::class, 'index'])->name('calendar.index');
Route::post('/fullcalenderAjax', [FullCalenderController::class, 'ajax'])->name('calendar.store');
});
// Depenses's routes
Route::get('/adddepense', function () {
    return view('admins.adddep');
})->name('ajouter.depense');
Route::get('/searchdepense',[DepenceController::class,'search'])->name('depense.search');
Route::get('/depenses', [DepenceController::class, 'listdepenses'])->name('depense.dashboard'); 
Route::post('/depenses/Ajouter', [DepenceController::class, 'storeDepense'])->name('depense.store');
Route::delete('/depenses/destroy/{depense}', [DepenceController::class, 'destroydepense'])->name('depense.destroy');
Route::get('/depenses/edit/{depense}', [DepenceController::class, 'editDepense'])->name('depense.edit');
Route::put('/depenses/{depense}', [DepenceController::class, 'updateDepense'])->name('depense.update');
// etudiant's routes 
 Route::get('/addetudiant', function () {
    $groupes = Groupe::all();
    $formations = Formation::all();
    return view('admins.addetd', ['groupes' => $groupes,'formations'=>$formations]);
    })->name('etudiant.registration');
 Route::get('/searchetudiant',[EtudiantController::class,'search'])->name('etudiant.search');
 Route::get('/etudiants', [EtudiantController::class, 'listetd'])->name('etudiant.dashboard'); 
 Route::post('/etudiant/registration', [RegisteredUserController::class, 'storeEtudiant'])->name('etudiant.registration.store');
 Route::delete('/etudiant/destroy/{etudiant}', [EtudiantController::class, 'destroyetd'])->name('etudiant.destroy');
 Route::get('/etudiant/edit/{etudiant}', [EtudiantController::class, 'editEtudiant'])->name('etudiant.edit');
 Route::put('/etudiant/{etudiant}', [EtudiantController::class, 'updateEtudiant'])->name('etudiant.update');
//employee's routes 
Route::get('/addemployee', function () {
    return view('admins.addemp');
})->name('employee.registration');
Route::get('/searchemployee',[EmployeeController::class,'search'])->name('employee.search');
Route::get('/employees', [EmployeeController::class, 'listemp'])->name('employee.dashboard'); 
Route::post('/employee/registration', [RegisteredUserController::class, 'storeEmployee'])->name('employee.registration.store');
Route::delete('/employee/destroy/{employee}', [EmployeeController::class, 'destroyemp'])->name('employee.destroy');
Route::get('/employee/edit/{employee}', [EmployeeController::class, 'editEmployee'])->name('employee.edit');
Route::put('/employee/{employee}', [EmployeeController::class, 'updateEmployee'])->name('employee.update');
//formateur's routes 
Route::get('/addformateur', function () {
    $formations = Formation::all();
    return view('admins.addfrm',['formations'=>$formations]);
})->name('formateur.registration');
Route::get('/searchformateur',[FormateurController::class,'search'])->name('formateur.search');
Route::get('/formateurs', [FormateurController::class, 'listfrm'])->name('formateur.dashboard'); 
Route::post('/formateur/registration', [RegisteredUserController::class, 'storeFormateur'])->name('formateur.registration.store');
Route::delete('/formateur/destroy/{formateur}', [FormateurController::class, 'destroyformateur'])->name('formateur.destroy');
Route::get('/formateur/edit/{formateur}', [FormateurController::class, 'editFormateur'])->name('formateur.edit');
Route::put('/formateur/{formateur}', [FormateurController ::class, 'updateFormateur'])->name('formateur.update');
Route::get('/formateurs/{id}/formations', [FormateurController::class, 'getFormations'])->name('formateurs.formations');

//formation's routes
Route::get('/searchformation',[FormationController::class,'search'])->name('formation.search');
Route::get('/addFormation',[FormationController::class, 'formulaireForm'])->name('ajouter.formation');
Route::get('/formations', [FormationController::class, 'listformation'])->name('formation.dashboard'); 
Route::post('/formations/ajouter-formation', [FormationController::class, 'addformation'])->name('formation.store'); 
Route::delete('/formation/destroy/{formation}', [FormationController::class, 'destroyformation'])->name('formation.destroy');
Route::get('/formation/edit/{formation}', [FormationController::class, 'editFormation'])->name('formation.edit');
Route::put('/formation/{formation}', [FormationController::class, 'updateFormation'])->name('formation.update');
//seances routes
Route::get('/addSeance', function () {
    return view('admins.addseance');
})->name('ajouter.seance');
Route::get('/searchseance',[SeanceController::class,'search'])->name('seance.search');
Route::get('/seances', [SeanceController::class, 'listseance'])->name('seance.dashboard'); 
Route::post('/seances/ajouter-seance', [SeanceController::class, 'addseance'])->name('seance.store'); 
Route::get('/addSeance',[SeanceController::class, 'formulaireS'])->name('ajouter.seance');
Route::delete('/seance/destroy/{seance}', [SeanceController::class, 'destroyseance'])->name('seance.destroy');
Route::get('/seance/edit/{seance}', [SeanceController::class, 'editSeance'])->name('seance.edit');
Route::put('/seance/{seance}', [SeanceController::class, 'updateSeance'])->name('seance.update');
// groupes routes 
Route::get('/searchgroupe',[GroupesController::class,'search'])->name('groupe.search');
Route::get('/addGroupe',[GroupesController::class, 'formulaireG'])->name('ajouter.groupe');
Route::get('/groupes', [GroupesController::class, 'listgroupe'])->name('groupe.dashboard'); 
Route::post('/groupes/ajouter-groupe', [GroupesController::class, 'addgroupe'])->name('groupe.store'); 
Route::delete('/groupe/destroy/{groupe}', [GroupesController::class, 'destroygroupe'])->name('groupe.destroy');
Route::get('/groupe/edit/{groupe}', [GroupesController::class, 'editGroupe'])->name('groupe.edit');
Route::put('/groupe/{groupe}', [GroupesController::class, 'updateGroupe'])->name('groupe.update');
Route::get('/formateurs/{id}/formations', [GroupesController::class, 'getFormations']);
// paiement routes 
Route::get('/searchpaiement',[PaiementController::class,'search'])->name('paiement.search');
Route::get('/addPaiement',[PaiementController::class, 'formulaireP'])->name('ajouter.paiement');
Route::get('/paiement', [PaiementController::class, 'listpaiement'])->name('paiement.dashboard'); 
Route::post('/paiements/ajouter-paiement', [PaiementController::class, 'addpaiement'])->name('paiement.store'); 
Route::delete('/paiement/destroy/{paiement}', [PaiementController::class, 'destroypaiement'])->name('paiement.destroy');
Route::get('/paiement/edit/{paiement}', [PaiementController::class, 'editPaiement'])->name('paiement.edit');
Route::put('/paiement/{paiement}', [PaiementController::class, 'updatePaiement'])->name('paiement.update');

//authentication routes 
Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); 
});
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login.index');    
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login'); 
    });

require __DIR__.'/auth.php';
 








