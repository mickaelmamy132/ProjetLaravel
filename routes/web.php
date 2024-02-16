<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CondamnerController;
use App\Http\Controllers\prevenusController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\libererController;
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
Route::redirect('/','/Login_up'); 

Route::get('/index', [PageController::class, 'Index']);
Route::get('/Login_up', [PageController::class, 'log']);
Route::Post('/Login_in', [PageController::class, 'log_in']);

// Route pour les tables
Route::get('index/tableCondamner', [PageController::class, 'CondamnerTable'])->name('user.index');
Route::get('index/tablePrevenus', [PageController::class, 'PrevenusTable'])->name('user.index');
Route::get('index/tableLiberer', [PageController::class, 'LibererTable'])->name('user.index');
Route::get('index/tableEvader', [PageController::class, 'EvaderTable'])->name('user.index');
Route::get('index/listeLiberer', [PageController::class, 'listeLiberer'])->name('user.index');
Route::Post('index/Edite_utilisateur/{id}', [PageController::class, 'Edite_utilisateur'])->name('user.index');
Route::Post('index/Edite_utilisateur/edithe/{id}', [PageController::class, 'Edite_utilisateur_utilisateur'])->name('user.index');
//fin

// Route pdf
Route::Post('index/imprimerTableau', [PdfController::class, 'Impre'])->name('user.index');
// Route::Post('index/imprimerstatisstique', [PdfController::class, 'ImpreStater'])->name('user.index');
Route::Post('index/imprimerstatisstique', [PdfController::class, 'ImpreStat'])->name('user.index');
Route::Post('index/impStat', [PdfController::class, 'Imp'])->name('user.index');
Route::Post('index/certificat_liberer/{id}', [PdfController::class, 'LibererImprime'])->name('user.index');
Route::get('index/tableCondamner/Liste_condamner', [PdfController::class, 'listage_condamner']);
Route::get('index/tablePrevenus/liste_prevenus', [PdfController::class, 'listage_prevenus']);
Route::Post('index/tableCondamner/Liberation_Cond/{id}', [PdfController::class, 'liberation_condition']);
// fin

// Route pour Condamner
Route::get('index/tableCondamner/ajoutCondamner', [PageController::class, 'affichAjoutC']);
Route::get('index/tableCondamner/informationCond_libere/{id}', [CondamnerController::class, 'Condamner_libere']);
Route::Post('index/tableCondamner/ajoutCondamner/ajoutCondamn', [CondamnerController::class, 'ajoutManuel']);
Route::Post('index/tableCondamner/ajoutCondamner/ajoutcondamn/{id}', [CondamnerController::class, 'ajoutCondamner']);
Route::Post('index/tableCondamner/ajoutCondamner/ajoutPrevenusPreventive/{id}', [CondamnerController::class, 'ajoutPrevenusPreventive']);
Route::Post('index/tableCondamner/ajoutCondamner/ajoutcondamnSanspeine/{id}', [CondamnerController::class, 'peine_mort_perpetuite']);
Route::Post('index/tableCondamner/ajoutCondamner/ajoutcondamnLiberer/{id}', [CondamnerController::class, 'Liberation']);
Route::get('index/tableCondamner/informationCond/{id}', [CondamnerController::class, 'affice_condamner']);
Route::get('index/tableCondamner/informationCond/historique/{id}', [CondamnerController::class, 'affice_condamner_historique']);
Route::get('index/tableCondamner/edit/{id}', [CondamnerController::class, 'modif_condamner']);
Route::get('index/tableCondamner/remise/{id}', [CondamnerController::class, 'remise_condamner']);
Route::Post('index/tableCondamner/edithPeine/{id}', [CondamnerController::class, 'remise_condamner_peine']);
Route::Post('index/tableCondamner/editCondamner/{id}', [CondamnerController::class, 'modifSitu_condamner']);
Route::Post('index/tableCondamner/editCondamnerSituation/{id}', [CondamnerController::class, 'modifSitu_condamner_Situation']);
Route::Post('index/tableCondamner/supprimer/{id}', [CondamnerController::class, 'suppression_Condamner']);
Route::Post('index/tableLiberer/supprimer/{id}', [CondamnerController::class, 'suppression_Liberer']);
Route::get('index/tableCondamner/Liberation_Cond_view/{id}', [CondamnerController::class, 'liberation_condition_view']);


//fin

//Route prevenus
Route::get('index/tablePrevenus/ajoutPrevenus', [prevenusController::class, 'ajoutPrevenus']);
Route::Post('index/tableCondamner/ajoutCondamner/ajoutprevenus', [prevenusController::class, 'ajoutPre']);
Route::get('index/tablePrevenus/informationPre/{id}', [prevenusController::class, 'afficheInfos']);
Route::get('index/tablePrevenus/edit/{id}', [prevenusController::class, 'edith_prevenus']);
Route::get('index/tablePrevenus/edit_status/{id}', [prevenusController::class, 'edith_prevenus_blade_status']);
Route::get('index/tablePrevenus/editInformation/{id}', [prevenusController::class, 'edith_information_prevenus']);
Route::Post('index/tablePrevenus/ajoutprevenus/edith_information_prevenus/{id}', [prevenusController::class, 'edith_information_prevenus_2em']);
Route::Post('index/tablePrevenus/edithPeine/{id}', [prevenusController::class, 'edith_prevenus_peine']);
Route::Post('index/tablePrevenus/editPrev/{id}', [prevenusController::class, 'Edith_Prevenus_1Status']);
Route::Post('index/tablePrevenus/editPrevenus/{id}', [prevenusController::class, 'Edith_Prevenus_Status']);
Route::Post('index/tablePrevenus/edit_situation_Prevenus/{id}', [prevenusController::class, 'Edith_Prevenus_Situation']);
Route::get('index/tablePrevenus/apreJugement_verifi/{id}', [prevenusController::class, 'Edith_Prevenus_Apres_ugement_veifier']);
Route::get('index/tablePrevenus/prolongation/{id}', [prevenusController::class, 'Edith_Prevenus_Prolongation']);
Route::Post('index/tablePrevenus/prolongation_edit/{id}', [prevenusController::class, 'Edith_Prevenus_Prolongation_RP']);
Route::Post('index/tablePrevenus/prolongation_edit_CO/{id}', [prevenusController::class, 'Edith_Prevenus_Prolongation_CO']);
Route::Post('index/tablePrevenus/prolongation_edit_CR/{id}', [prevenusController::class, 'Edith_Prevenus_Prolongation_CR']);
Route::get('index/tablePrevenus/prolongation_OTPCA/{id}', [prevenusController::class, 'Edith_Prevenus_OTPCA']);
Route::Post('index/tablePrevenus/prolongation_OTPCA_CO/{id}', [prevenusController::class, 'Edith_Prevenus_OTPCA_CO']);
Route::Post('index/tableCondamner/verification/{id}', [prevenusController::class, 'Edith_Prevenus_Apres_ugement_veification']);
Route::get('index/tablePrevenus/informationPrev/historique/{id}', [prevenusController::class, 'affiche_historique_prevenus']);
Route::Post('index/tablePrevenus/supprimer/{id}', [prevenusController::class, 'suppression_prevenus']);
// Route::get('index/tablePrevenus/apreJugement/{id}', [prevenusController::class, 'Edith_Prevenus_Apres_ugement']);
// fin

// Route pour liberer
Route::get('index/tablelibre/information/{id}', [libererController::class, 'affichinfos'])->name('user.index');
Route::get('index/tableEvader/informationCond/{id}', [CondamnerController::class, 'affich_Evader'])->name('user.index');
//fin

Route::get('/sign_in', [PageController::class, 'sign_in']);
Route::Post('sign_up', [PageController::class, 'sign']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
