<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\utilisateur;
use App\Models\condamner;
use App\Models\prevenus;
use App\Models\liberer;
use App\Models\condamner_historie;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PageController extends Controller
{
        
        public function Index() { 
       
        $date = Carbon::now();
        $jourSuivant = $date->addDay(7);

        $condamnerNombre = condamner::where(function ($query) use ($jourSuivant) {
            $query->where(function ($subQuery) use ($jourSuivant) {
                $subQuery->whereDay('date_fin_remise_peine', $jourSuivant->day)
                ->whereMonth('date_fin_remise_peine', $jourSuivant->month)
                    ->whereYear('date_fin_remise_peine', $jourSuivant->year);
            })->orWhere(function ($subQuery) use ($jourSuivant) {
                $subQuery->whereDay('date_fin_peine', $jourSuivant->day)
                ->whereMonth('date_fin_peine', $jourSuivant->month)
                    ->whereYear('date_fin_peine', $jourSuivant->year);
            });
        })
        ->count();

            $condamner = condamner::count(); 
            $prevenus = prevenus::count();      
            $liberer = liberer::count(); 
        // Année courante
        $anneeCourante = Carbon::now()->year;
      


        $datejanvier = Carbon::create($anneeCourante, 1, 1);
        $MoisJanvier = $datejanvier->format('m');

        $datefevrier = Carbon::create($anneeCourante, 2, 1);
        $Moisfevrier = $datefevrier->format('m');

        $datemars = Carbon::create($anneeCourante, 3, 1);
        $Moismars = $datemars->format('m');

        $dateavril = Carbon::create($anneeCourante, 4, 1);
        $Moisavril = $dateavril->format('m');

        $datemais = Carbon::create($anneeCourante, 5, 1);
        $Moismais = $datemais->format('m');

        $datejuin = Carbon::create($anneeCourante, 6, 1);
        $Moisjuin = $datejuin->format('m');

        $datejuillet = Carbon::create($anneeCourante, 7, 1);
        $Moisjuillet = $datejuillet->format('m');

        $dateaout = Carbon::create($anneeCourante, 8, 1);
        $Moisaout = $dateaout->format('m');

        $dateseptembre = Carbon::create($anneeCourante, 9, 1);
        $Moisseptembre = $dateseptembre->format('m');

        $dateoctobre = Carbon::create($anneeCourante, 10, 1);
        $Moisoctobre = $dateoctobre->format('m');

        $datenovembre = Carbon::create($anneeCourante, 11, 1);
        $Moisnovembre = $datenovembre->format('m');

        $datedecembre = Carbon::create($anneeCourante, 12, 1);
        $Moisdecembre = $datedecembre->format('m');


        // tableau evasion
        $janvier = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$MoisJanvier)->whereYear('date_situation','=',$anneeCourante)->count();
        $fevrier = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moisfevrier)->whereYear('date_situation','=',$anneeCourante)->count();
        $mars = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moismars)->whereYear('date_situation','=',$anneeCourante)->count();
        $avril = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moisavril)->whereYear('date_situation','=',$anneeCourante)->count();
        $mai = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moismais)->whereYear('date_situation','=',$anneeCourante)->count();
        $juin = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moisjuin)->whereYear('date_situation','=',$anneeCourante)->count();
        $juillet = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moisjuillet)->whereYear('date_situation','=',$anneeCourante)->count();
        $Aout = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moisaout)->whereYear('date_situation','=',$anneeCourante)->count();
        $septembre = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moisseptembre)->whereYear('date_situation','=',$anneeCourante)->count();
        $octobre = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moisoctobre)->whereYear('date_situation','=',$anneeCourante)->count();
        $novembre = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moisnovembre)->whereYear('date_situation','=',$anneeCourante)->count();
        $decembre = condamner_historie::where('situation', '=', 'Evadé(e)')->whereMonth('date_situation','=',$Moisdecembre)->whereYear('date_situation','=',$anneeCourante)->count();

        // tableau hospitaliserHospitalisè(e)
        $janvier2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$MoisJanvier)->whereYear('date_situation','=',$anneeCourante)->count();
        $fevrier2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moisfevrier)->whereYear('date_situation','=',$anneeCourante)->count();
        $mars2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moismars)->whereYear('date_situation','=',$anneeCourante)->count();
        $avril2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moisavril)->whereYear('date_situation','=',$anneeCourante)->count();
        $mai2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moismais)->whereYear('date_situation','=',$anneeCourante)->count();
        $juin2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moisjuin)->whereYear('date_situation','=',$anneeCourante)->count();
        $juillet2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moisjuillet)->whereYear('date_situation','=',$anneeCourante)->count();
        $Aout2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moisaout)->whereYear('date_situation','=',$anneeCourante)->count();
        $septembre2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moisseptembre)->whereYear('date_situation','=',$anneeCourante)->count();
        $octobre2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moisoctobre)->whereYear('date_situation','=',$anneeCourante)->count();
        $novembre2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moisnovembre)->whereYear('date_situation','=',$anneeCourante)->count();
        $decembre2 = condamner_historie::where('situation', '=', 'Hospitalisè(e)')->whereMonth('date_situation','=',$Moisdecembre)->whereYear('date_situation','=',$anneeCourante)->count();
        
        // tableau deces(e)
        $janvier3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$MoisJanvier)->whereYear('date_situation','=',$anneeCourante)->count();
        $fevrier3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moisfevrier)->whereYear('date_situation','=',$anneeCourante)->count();
        $mars3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moismars)->whereYear('date_situation','=',$anneeCourante)->count();
        $avril3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moisavril)->whereYear('date_situation','=',$anneeCourante)->count();
        $mai3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moismais)->whereYear('date_situation','=',$anneeCourante)->count();
        $juin3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moisjuin)->whereYear('date_situation','=',$anneeCourante)->count();
        $juillet3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moisjuillet)->whereYear('date_situation','=',$anneeCourante)->count();
        $Aout3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moisaout)->whereYear('date_situation','=',$anneeCourante)->count();
        $septembre3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moisseptembre)->whereYear('date_situation','=',$anneeCourante)->count();
        $octobre3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moisoctobre)->whereYear('date_situation','=',$anneeCourante)->count();
        $novembre3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moisnovembre)->whereYear('date_situation','=',$anneeCourante)->count();
        $decembre3 = condamner_historie::where('situation', '=', 'Décès(e)')->whereMonth('date_situation','=',$Moisdecembre)->whereYear('date_situation','=',$anneeCourante)->count();
     
            return view('tous.vueEnsemble',compact('condamner','prevenus','liberer','condamnerNombre','janvier','fevrier','mars','avril','mai','juin','juillet','Aout','septembre','octobre','novembre','decembre','janvier2','fevrier2','mars2','avril2','mai2','juin2','juillet2','Aout2','septembre2','octobre2','novembre2','decembre2','janvier3','fevrier3','mars3','avril3','mai3','juin3','juillet3','Aout3','septembre3','octobre3','novembre3','decembre3'));
       }


 
    public function CondamnerTable(Request $request){
        // Date actuelle
        $date = Carbon::now();
        $jourSuivant = $date->addDay(7);

        $condamnerNombre = condamner::where(function ($query) use ($jourSuivant) {
            $query->where(function ($subQuery) use ($jourSuivant) {
                $subQuery->whereDay('date_fin_remise_peine', $jourSuivant->day)
                ->whereMonth('date_fin_remise_peine', $jourSuivant->month)
                    ->whereYear('date_fin_remise_peine', $jourSuivant->year);
            })->orWhere(function ($subQuery) use ($jourSuivant) {
                $subQuery->whereDay('date_fin_peine', $jourSuivant->day)
                ->whereMonth('date_fin_peine', $jourSuivant->month)
                    ->whereYear('date_fin_peine', $jourSuivant->year);
            });
        })
        ->count();
        // $condamners = Condamner::where('situation','=','en detention(e)')->get();
        $nombreCondamnés = Condamner::where('status','=','Emprisonnement')->count();
        $nombreCondamnés_force = Condamner::where('status','=','Travaux Force')->count();
        $nombreCondamnés_mort = Condamner::where('status','=','peine de mort')->count();
        $nombreCondamnés_mort2 = Condamner::where('status','=','Travaux Force à perpétuité')->count();
        $association = $nombreCondamnés_mort + $nombreCondamnés_mort2;
        $nombreCondamnés_preventive = condamner::where('status','=','Detention préventive')->count();
 
        $query = $request->input('search');

                if ($query) {
                    $condamners = condamner::where('nom', 'like', '%' . $query . '%')
                        ->orWhere('id', 'like', '%' . $query . '%')
                        ->orWhere('type', 'like', '%' . $query . '%')
                        ->orWhere('status', 'like', '%' . $query . '%')
                        ->get();
                } else {
                    // $condamners = Condamner::where('situation','=','en detention(e)')->get();
                    $condamners = Condamner::where(function($query) {
                        $query->where('situation', '=', 'en detention(e)')
                              ->orWhere('situation', '=', 'transfere(e)')
                              ->orWhere('situation', '=', 'passagers(e)');
                    })
                    ->orderBy('id', 'desc') 
                    ->get();
                }
        return view('Condamner.tableCondamner', compact('condamners','nombreCondamnés','condamnerNombre','nombreCondamnés_force','association','nombreCondamnés_preventive'));
        }

        public function PrevenusTable(Request $request){
                // Date actuelle
                $date = Carbon::now();
                $jourSuivant = $date->addDay(7);
        
                $condamnerNombre = condamner::where(function ($query) use ($jourSuivant) {
                    $query->where(function ($subQuery) use ($jourSuivant) {
                        $subQuery->whereDay('date_fin_remise_peine', $jourSuivant->day)
                        ->whereMonth('date_fin_remise_peine', $jourSuivant->month)
                            ->whereYear('date_fin_remise_peine', $jourSuivant->year);
                    })->orWhere(function ($subQuery) use ($jourSuivant) {
                        $subQuery->whereDay('date_fin_peine', $jourSuivant->day)
                        ->whereMonth('date_fin_peine', $jourSuivant->month)
                            ->whereYear('date_fin_peine', $jourSuivant->year);
                    });
                })
                ->count();
            $prevenus = prevenus::all();
            $nombrePrevenus = Prevenus::where('categorie', 'prevenus')->count();
            $nombreAccuses = Prevenus::where('categorie', 'Accuses')->count();
            $nombreInculpes = Prevenus::where('categorie', 'Inculpes')->count();
            $query = $request->input('search');

                if ($query) {
                    $prevenus = Prevenus::where('nom', 'like', '%' . $query . '%')
                        ->orWhere('id', 'like', '%' . $query . '%')
                        ->orWhere('type', 'like', '%' . $query . '%')
                        ->orWhere('categorie', 'like', '%' . $query . '%')
                        ->get();
                } else {
                    $prevenus = prevenus::orderBy('id', 'desc')->get();
                }
            return view('Prevenus.tablePrevenus',compact('prevenus','nombrePrevenus','nombreAccuses','nombreInculpes','condamnerNombre'));
        }

        public function LibererTable(Request $request){
            $date = Carbon::now();
        $jourSuivant = $date->addDay(7);

        $condamnerNombre = condamner::where(function ($query) use ($jourSuivant) {
            $query->where(function ($subQuery) use ($jourSuivant) {
                $subQuery->whereDay('date_fin_remise_peine', $jourSuivant->day)
                ->whereMonth('date_fin_remise_peine', $jourSuivant->month)
                    ->whereYear('date_fin_remise_peine', $jourSuivant->year);
            })->orWhere(function ($subQuery) use ($jourSuivant) {
                $subQuery->whereDay('date_fin_peine', $jourSuivant->day)
                ->whereMonth('date_fin_peine', $jourSuivant->month)
                    ->whereYear('date_fin_peine', $jourSuivant->year);
            });
        })
        ->count();
            // $liberer = liberer::paginate(3);
            $liberer = liberer::all();
            $nombreLiberer = liberer::count();

            $query = $request->input('search');

                if ($query) {
                    $liberer = liberer::where('nom', 'like', '%' . $query . '%')
                        ->orWhere('id', 'like', '%' . $query . '%')
                        ->orWhere('type', 'like', '%' . $query . '%')
                        ->orWhere('prenom', 'like', '%' . $query . '%')
                        ->orWhere('categorie', 'like', '%' . $query . '%')
                        ->get();
                } else {
                    $liberer = liberer::orderBy('id', 'desc')->get();
                }
            return view('Liberer.tableLiberer',compact('liberer','nombreLiberer','condamnerNombre'));
        }


        public function EvaderTable(Request $request){
            $date = Carbon::now();
            $jourSuivant = $date->addDay(7);
    
            $condamnerNombre = condamner::where(function ($query) use ($jourSuivant) {
                $query->where(function ($subQuery) use ($jourSuivant) {
                    $subQuery->whereDay('date_fin_remise_peine', $jourSuivant->day)
                    ->whereMonth('date_fin_remise_peine', $jourSuivant->month)
                        ->whereYear('date_fin_remise_peine', $jourSuivant->year);
                })->orWhere(function ($subQuery) use ($jourSuivant) {
                    $subQuery->whereDay('date_fin_peine', $jourSuivant->day)
                    ->whereMonth('date_fin_peine', $jourSuivant->month)
                        ->whereYear('date_fin_peine', $jourSuivant->year);
                });
            })
            ->count();
            
            $condamners = Condamner::where('situation','=','Evadé(e)')
            ->orWhere('situation','=','Décès(e)')
            ->orWhere('situation','=','Hospitalisé(e)')
            ->orderBy('id', 'desc') 
            ->get();


        $evader = condamner_historie::where('situation','=','Evadé(e)')
        ->count();

        $deces = condamner_historie::Where('situation','=','Décès(e)')
        ->count();

        $hospitaliser = condamner_historie::Where('situation','=','Hospitalisé(e)')
        ->count();


            $query = $request->input('search');

                if ($query) {
                    $condamners = condamner::where('nom', 'like', '%' . $query . '%')
                        ->orWhere('id', 'like', '%' . $query . '%')
                        ->orWhere('type', 'like', '%' . $query . '%')
                        ->orWhere('situation', 'like', '%' . $query . '%')
                        ->get();
                } else {
                    $condamners = Condamner::latest()->where('situation','=','Evadé(e)')
                    ->orWhere('situation','=','Décès(e)')
                    ->orWhere('situation','=','Hospitalisé(e)')
                    ->orderBy('id', 'desc')
                    ->get();
                }
            return view('Evader.tableEvader', compact('condamners','condamnerNombre','evader','deces','hospitaliser'));
        }
        public function affichAjoutC(){
            return view('Condamner.ajoutCondamner');
        } 

        public function listeLiberer(){

            $date = Carbon::now();
            $jourSuivant = $date->addDay(7);
    
            $condamners = condamner::where(function ($query) use ($jourSuivant) {
                $query->where(function ($subQuery) use ($jourSuivant) {
                    $subQuery->whereDay('date_fin_remise_peine', $jourSuivant->day)
                    ->whereMonth('date_fin_remise_peine', $jourSuivant->month)
                        ->whereYear('date_fin_remise_peine', $jourSuivant->year);
                })->orWhere(function ($subQuery) use ($jourSuivant) {
                    $subQuery->whereDay('date_fin_peine', $jourSuivant->day)
                    ->whereMonth('date_fin_peine', $jourSuivant->month)
                        ->whereYear('date_fin_peine', $jourSuivant->year);
                });
            })
            ->orderBy('id', 'desc')
            ->get();
             return view('tous.AfficheCondamnerMois', compact('condamners'));
        }
        
        
        
        public function sign_in( request $request) {        
            return view('Login.sign');
       }
       public function sign(Request $request){
        $pass = $request->password;
        $pass2 = $request->re_password;
        
        
        if ($pass != $pass2){
            session()->flash('message', 'Les mots de passe ne correspondent pas');
            return redirect()->back();
        }
        
        else{
            $sign = new utilisateur();
            $sign->nom = $request->nom;
            // $sign->email = $request->mail;
            $photo = $request->file('photo');
            // dd($photo);
            if ($request->hasFile('photo') && $photo->isValid()) {
                $monPhoto =  time().'.'.$photo->getClientOriginalExtension();
                $chemin = public_path('/imageUtilisateur');
                $photo->move($chemin, $monPhoto);
                } else {
                
                $imageDefaultCounter =  1;

                $monPhoto = 'image_default_' . $imageDefaultCounter . '.jpg';
                $imageDefaultPath = public_path( 'image_Default/image_default.jpg' );
                // Vérifier si le fichier existe déjà, et incrémenter le compteur si nécessaire
                while ( file_exists( public_path( '/imageUtilisateur/' . $monPhoto ) ) ) {
                    $imageDefaultCounter++;
                    $monPhoto = 'image_default_' . $imageDefaultCounter . '.jpg';
                }

                $destinationPath = public_path('/imageUtilisateur/'.$monPhoto);
                copy($imageDefaultPath, $destinationPath);
            
            }
            $sign->photo = basename($monPhoto);
            $sign->password = bcrypt($request->password);
            $sign->save();
            return redirect('/Login_up'); 
        }
        }


        public function log(){
            return view('Login.login');
        }

        public function log_in(Request $request){
            $nom = $request->input('nom');
            $pass = $request->input('password');
            
            $utilisateur = utilisateur::where('nom', $nom)->first();
            if ($utilisateur && Hash::check($pass, $utilisateur->password)) {
                Session::put('utilisateur', $utilisateur->id);
                return redirect('/index');
            } else {
                session()->flash('message', 'Mot de passe incorrect ou compte non trouvé');
                return redirect()->back();
            } 
        }

        public function Edite_utilisateur($id,){
            $utilisateur = utilisateur::find($id);
            return view('Login.Edithe_utilisateur',compact('utilisateur'));

        }

        public function Edite_utilisateur_utilisateur($id, Request $request){
            $utilisateur = utilisateur::find($id);
            if ($utilisateur){
                if ($request->input('nom') == null){
                    $nom = $utilisateur->nom;
                }
                else{
                    $nom = $request->input('nom');
                }

                if ( $request->hasFile( 'photo' ) && $request->file( 'photo' )->isValid() ) {
                    $newPhotoPath = null;
                    if ( file_exists( public_path( '/imageUtilisateur/'.$utilisateur->photo ) ) ) { 
                        unlink( public_path( '/imageUtilisateur/'.$utilisateur->photo ));
                    }
    
                    $newPhoto = $request->file( 'photo' );
                    $newPhotoPath = time() . '.' . $newPhoto->getClientOriginalExtension();
                    $newPhoto->move( public_path( '/imageUtilisateur' ), $newPhotoPath );
                } else {
                    $newPhotoPath = $utilisateur->photo;
                }

                $utilisateur->nom = $nom;
                $utilisateur->photo = $newPhotoPath;
                $utilisateur->save();
                return redirect( '/index' );
            }
        }
        
      
}