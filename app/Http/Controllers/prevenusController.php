<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prevenus;
use App\Models\utilisateur;
use App\Models\prevenus_historie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class prevenusController extends Controller {
    //

    public function ajoutPrevenus() {
        return view( 'Prevenus.ajoutPrevenus' );
    }

    public function ajoutPre( Request $request ) {
        // dd( $request->all() );
        $dateActuelle = Carbon::now();
        $numero = $request->input( 'numero' );
        $type = $request->input( 'type' ) ;
        $nom = $request->input( 'nom' );

        $datenaissance1 = $request->input( 'date_naissance1' );
        $datenaissance2 = $request->input( 'date_naissance2' );

        $nationalite = $request->input( 'nationalite' );
        $mere = $request->input( 'mere' );
        $categorie = $request->input( 'categorie' );
        $sexe = $request->input( 'sexe' );
        $situation = $request->input( 'situation' );
        $photo = $request->file( 'photo' );
        $inculpations = $request->input( 'inculpation' );
        $mandataire = $request->input( 'mandataire' );
        $stringInculpation = implode( ',', $inculpations );

        
        if (is_array($inculpations) && count($inculpations) > 1) {
            $dpac = 'DPAC';
        } else {
            $dpac = null;
        }
        $date_ecrou = $request->input( 'date_ecrou' );

        if ( $request->input( 'prenom' ) === '' ) {
            $prenom = null;
        } else {
            $prenom = $request->input( 'prenom' );
        }

        if ( $request->input( 'lieu' ) === '' ) {
            $lieu = null;
        } else {
            $lieu = $request->input( 'lieu' );
        }

        if ( $request->input( 'cartier' ) === '' ) {
            $cartier = null;
        } else {
            $cartier = $request->input( 'cartier' );
        }

        if ( $request->input( 'commune' ) === '' ) {
            $commune = null;
        } else {
            $commune = $request->input( 'commune' );
        }

        if ( $request->input( 'district' ) === '' ) {
            $district = null;
        } else {
            $district = $request->input( 'district' );
        }

        if ( $request->input( 'region' ) === '' ) {
            $region = null;
        } else {
            $region = $request->input( 'region' );
        }

        if ( $request->input( 'profession' ) === '' ) {
            $profession = null;
        } else {
            $profession = $request->input( 'profession' );
        }

        if ( $request->input( 'pere' ) === '' ) {
            $pere = null;
        } else {
            $pere = $request->input( 'pere' );
        }

        if ( $request->input( 'marie' ) === '' ) {
            $marie = null;
        } else {
            $marie = $request->input( 'marie' );
        }

        if ( $request->input( 'enfant' ) === '' ) {
            $enfant = null;
        } else {
            $enfant = $request->input( 'enfant' );
        }

        if ( $request->input( 'adresse' ) === '' ) {
            $adresse = null;
        } else {
            $adresse = $request->input( 'adresse' );
        }
        
        if ( $request->input( 'cartier1' ) === '' ) {
            $cartier1 = null;
        } else {
            $cartier1 = $request->input( 'cartier1' );
        }
        
        if ( $request->input( 'commune1' ) === '' ) {
            $commune1 = null;
        } else {
            $commune1 = $request->input( 'commune1' );
        }

        if ( $request->input( 'district1' ) === '' ) {
            $district1 = null;
        } else {
            $district1 = $request->input( 'district1' );
        }

        if ( $request->input( 'region1' ) === '' ) {
            $region1 = null;
        } else {
            $region1 = $request->input( 'region1' );
        }

        if ( $request->input( 'contact' ) === '' ) {
            $contact = null;
        } else {
            $contact = $request->input( 'contact' );
        }

        if ( $request->input( 'cin' ) === '' ) {
            $cin = null;
        } else {
            $cin = $request->input( 'cin' );
        }

        if ( $request->input( 'date_delivrance' ) === '' ) {
            $date_delivrance = null;
        } else {
            $date_delivrance = $request->input( 'date_delivrance' );
        }
 
        $mandat_arret = null;
        if ( !is_array( $type ) ) {
            $typeArray  = explode( '/', $type );
            if ( count( $typeArray ) > 0 ) {
                if ( $typeArray[ 0 ] === 'RP' || $typeArray[ 0 ] === 'rp' || $typeArray[ 0 ] === 'Rp' || $typeArray[ 0 ] === 'rP' ) {
                    $mandat_arret = 3;
                } elseif ( $typeArray[ 0 ] === 'CO' || $typeArray[ 0 ] === 'Co' || $typeArray[ 0 ] === 'cO' || $typeArray[ 0 ] === 'co' ) {
                    $mandat_arret = 6;
                } elseif ( $typeArray[ 0 ] === 'CR' || $typeArray[ 0 ] === 'cr' || $typeArray[ 0 ] === 'Cr' || $typeArray[ 0 ] === 'cR' ) {
                    $mandat_arret = 8;
                }
            }
        }
        $prevenus = new prevenus();
        if ( $prevenus ) {
            if ( $datenaissance2 == '' ) {
                $dateNaissance = Carbon::createFromFormat( 'Y-m-d', $datenaissance1 );
                $AgeCond = $dateNaissance->diffInYears( $dateActuelle );
                $dateNaissance_table = $dateNaissance;
            }

            if ( $datenaissance1 == '' ) {

                $dateNaissance3 = Carbon::create( $datenaissance2, 1, 1 );
                $dateNaissance = $dateNaissance3->year;
                $AgeCond = $dateNaissance3->diffInYears( $dateActuelle );
                $dateNaissance_table = $dateNaissance;
            }
            $prevenus->numero = $numero;
            $prevenus->type = $type;
            $prevenus->nom = $nom;
            $prevenus->prenom = $prenom;
            $prevenus->naissance = $dateNaissance_table;
            $prevenus->lieu  = $lieu;
            $prevenus->cartier  = $cartier;
            $prevenus->region = $region;
            $prevenus->commune = $commune;
            $prevenus->district = $district;
            $prevenus->nationalité = $nationalite;
            $prevenus->cin = $cin;
            $prevenus->date_delivrance = $date_delivrance;
            $prevenus->profession = $profession;
            $prevenus->pere = $pere;
            $prevenus->mere = $mere;
            $prevenus->marié = $marie;
            $prevenus->enfant = $enfant;
            $prevenus->adresse = $adresse;
            $prevenus->cartier1  = $cartier1;
            $prevenus->region1 = $region1;
            $prevenus->commune1 = $commune1;
            $prevenus->district1 = $district1;
            $prevenus->contacte = $contact;
            $prevenus->categorie = $categorie;
            $prevenus->status = 'non jugé';
            $prevenus->date_status = $date_ecrou;
            $prevenus->situation = $situation;

            $prevenus->date_situation = $date_ecrou;
            $prevenus->sexe = $sexe;

            if ( $AgeCond < 18 ) {

                $prevenus->age = 'mineur';
            } else {
                // echo 'majeur';
                $prevenus->age = 'majeur';
            }
            if ( $request->hasFile( 'photo' ) && $photo->isValid() ) {
                $monPhoto = time().'.'.$photo->getClientOriginalExtension();
                $chemin = public_path( '/img' );
                $photo->move( $chemin, $monPhoto );
            } else {
                $imageDefaultCounter =  1;

                $monPhoto = 'image_default_' . $imageDefaultCounter . '.jpg';
                $imageDefaultPath = public_path( 'image_Default/image_default.jpg' );
                // Vérifier si le fichier existe déjà, et incrémenter le compteur si nécessaire
                while ( file_exists( public_path( '/img/' . $monPhoto ) ) ) {
                    $imageDefaultCounter++;
                    $monPhoto = 'image_default_' . $imageDefaultCounter . '.jpg';
                }

                // $monPhoto = 'image_default.jpg';

                // Copier l'image par défaut dans le dossier img
                $destinationPath = public_path('/img/'.$monPhoto);
                copy($imageDefaultPath, $destinationPath);
            } 
            
            $prevenus->ageDate = $AgeCond;
            // $prevenus->date_ecrou = $date_ecrou;
            $prevenus->date_ecrou = Carbon::createFromFormat('Y-m-d',$request->input('date_ecrou'));
            $prevenus->photo = '/img/'.$monPhoto;
            $prevenus->inculpation = $stringInculpation;
            $prevenus->classification = $dpac;
            $prevenus->mandataire = $mandataire;
            $prevenus->observation = null;
            $prevenus->date_observation = null;
            $prevenus->peine = null;
            if ($mandat_arret !== null) { // Vérifier si $mandat_arret est défini
                $fin_mandat = Carbon::createFromFormat('Y-m-d', $request->input('date_ecrou'))->addMonths($mandat_arret);
                $prevenus->date_fin_peine = $fin_mandat;
            }
            $prevenus->remise_peine = null;
            $prevenus->date_fin_remise_peine = null;
            $prevenus->save();
            prevenus_historie::create([
                'prevenus_id' => $prevenus->id,
                'situation' => $situation,
                'date_situation' => $date_ecrou,
                'status' => "non jugé",
                'date_status' => $date_ecrou, 
                'observation' => null, 
                'date_observation' => null, 
            ]);                
             return redirect('/index/tablePrevenus');
        }
        else{
            session()->flash('message', 'ajout na pas effectuer');
            return redirect()->back();
        }
    }

    // modification information prevenus

    public function edith_information_prevenus_2em( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ( $prevenus ) {
            $dateActuelle = Carbon::now();
            $numero = $request->input( 'numero' );
            $type = $request->input( 'type' ) ;
            $nom = $request->input( 'nom' );
            $datenaissance1 = $request->input( 'date_naissance1' );
            $datenaissance2 = $request->input( 'date_naissance2' );
            $nationalite = $request->input( 'nationalite' );
            $profession = $request->input( 'profession' );
            $mere = $request->input( 'mere' );
            $categorie = $request->input( 'categorie' );
            $sexe = $request->input( 'sexe' );
            $situation = $request->input( 'situation' );
            $inculpations = $request->input( 'inculpation' );
            $mandataire = $request->input( 'mandataire' );
            $stringInculpation = implode( ',', $inculpations );
            
            if (is_array($inculpations) && count($inculpations) > 1) {
                $dpac = 'DPAC';
            } else {
                $dpac = null;
            }
            $date_ecrou = $request->input( 'date_ecrou' );

            if ( $request->hasFile( 'photo' ) && $request->file( 'photo' )->isValid() ) {
                $newPhotoPath = null;
                if ( file_exists( public_path( $prevenus->photo ) ) ) { 
                    unlink( public_path( $prevenus->photo ) );
                }

                $newPhoto = $request->file( 'photo' );
                $newPhotoPath = 'img/' . time() . '.' . $newPhoto->getClientOriginalExtension();
                $newPhoto->move( public_path( '/img' ), $newPhotoPath );
            } else {
                $newPhotoPath = $prevenus->photo;
            }

            if ( $request->input( 'prenom' ) === '' ) {
                $prenom = null;
            } else {
                $prenom = $request->input( 'prenom' );
            }
    
            if ( $request->input( 'lieu' ) === '' ) {
                $lieu = null;
            } else {
                $lieu = $request->input( 'lieu' );
            }

            if ( $request->input( 'cartier' ) === '' ) {
                $cartier = null;
            } else {
                $cartier = $request->input( 'cartier' );
            }
    
            if ( $request->input( 'commune' ) === '' ) {
                $commune = null;
            } else {
                $commune = $request->input( 'commune' );
            }
    
            if ( $request->input( 'district' ) === '' ) {
                $district = null;
            } else {
                $district = $request->input( 'district' );
            }
    
            if ( $request->input( 'region' ) === '' ) {
                $region = null;
            } else {
                $region = $request->input( 'region' );
            }
    
            if ( $request->input( 'profession' ) === '' ) {
                $profession = null;
            } else {
                $profession = $request->input( 'profession' );
            }
    
            if ( $request->input( 'pere' ) === '' ) {
                $pere = null;
            } else {
                $pere = $request->input( 'pere' );
            }
    
            if ( $request->input( 'marie' ) === '' ) {
                $marie = null;
            } else {
                $marie = $request->input( 'marie' );
            }
    
            if ( $request->input( 'enfant' ) === '' ) {
                $enfant = null;
            } else {
                $enfant = $request->input( 'enfant' );
            }
    
            if ( $request->input( 'adresse' ) === '' ) {
                $adresse = null;
            } else {
                $adresse = $request->input( 'adresse' );
            }

            if ( $request->input( 'cartier1' ) === '' ) {
                $cartier1 = null;
            } else {
                $cartier1 = $request->input( 'cartier1' );
            }
            
            if ( $request->input( 'commune1' ) === '' ) {
                $commune1 = null;
            } else {
                $commune1 = $request->input( 'commune1' );
            }
    
            if ( $request->input( 'district1' ) === '' ) {
                $district1 = null;
            } else {
                $district1 = $request->input( 'district1' );
            }
    
            if ( $request->input( 'region1' ) === '' ) {
                $region1 = null;
            } else {
                $region1 = $request->input( 'region1' );
            }
    
            if ( $request->input( 'contact' ) === '' ) {
                $contact = null;
            } else {
                $contact = $request->input( 'contact' );
            }
    
            if ( $request->input( 'cin' ) === '' ) {
                $cin = null;
            } else {
                $cin = $request->input( 'cin' );
            }
    
            if ( $request->input( 'date_delivrance' ) === '' ) {
                $date_delivrance = null;
            } else {
                $date_delivrance = $request->input( 'date_delivrance' );
            }
    

            if ( $datenaissance2 == '' ) {
                $dateNaissance = Carbon::createFromFormat( 'Y-m-d', $datenaissance1 );
                $AgeCond = $dateNaissance->diffInYears( $dateActuelle );
                $dateNaissance_table = $dateNaissance;
            }

            if ( $datenaissance1 == '' ) {

                $dateNaissance3 = Carbon::create( $datenaissance2, 1, 1 );
                $dateNaissance = $dateNaissance3->year;
                $AgeCond = $dateNaissance3->diffInYears( $dateActuelle );
                $dateNaissance_table = $dateNaissance;
            }
            $mandat_arret = null;
            if ( !is_array( $type ) ) {
                $typeArray  = explode( '/', $type );
                if ( count( $typeArray ) > 0 ) {
                    if ( $typeArray[ 0 ] === 'RP' || $typeArray[ 0 ] === 'rp' || $typeArray[ 0 ] === 'Rp' || $typeArray[ 0 ] === 'rP' ) {
                        $mandat_arret = 3;
                    } elseif ( $typeArray[ 0 ] === 'CO' || $typeArray[ 0 ] === 'Co' || $typeArray[ 0 ] === 'cO' || $typeArray[ 0 ] === 'co' ) {
                        $mandat_arret = 6;
                    } elseif ( $typeArray[ 0 ] === 'CR' || $typeArray[ 0 ] === 'cr' || $typeArray[ 0 ] === 'Cr' || $typeArray[ 0 ] === 'cR' ) {
                        $mandat_arret = 8;
                    }
                }
            }
            $prevenus->numero = $numero;
            $prevenus->type = $type;
            $prevenus->nom = $nom;
            $prevenus->prenom = $prenom;
            $prevenus->naissance = $dateNaissance_table;
            $prevenus->lieu  = $lieu;
            $prevenus->cartier  = $cartier;
            $prevenus->region = $region;
            $prevenus->commune = $commune;
            $prevenus->district = $district;
            $prevenus->nationalité = $nationalite;
            $prevenus->cin = $cin;
            $prevenus->date_delivrance = $date_delivrance;
            $prevenus->profession = $profession;
            $prevenus->pere = $pere;
            $prevenus->mere = $mere; 
            $prevenus->marié = $marie;
            $prevenus->enfant = $enfant;
            $prevenus->adresse = $adresse;
            $prevenus->cartier1  = $cartier1;
            $prevenus->region1 = $region1;
            $prevenus->commune1 = $commune1;
            $prevenus->district1 = $district1;
            $prevenus->contacte = $contact;
            $prevenus->categorie = $categorie;
            $prevenus->status = 'non jugé';
            $prevenus->date_status = $date_ecrou;
            $prevenus->situation = $situation;
            $prevenus->date_situation = $date_ecrou;
            $prevenus->sexe = $sexe;

            if ( $AgeCond < 18 ) {

                $prevenus->age = 'mineur';
            } else {
                // echo 'majeur';
                $prevenus->age = 'majeur';
            }

            $prevenus->ageDate = $AgeCond;
            // $prevenus->date_ecrou = $date_ecrou;
            $prevenus->date_ecrou = Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_ecrou' ) );
            $prevenus->photo = $newPhotoPath;
            $prevenus->inculpation = $stringInculpation;
            $prevenus->classification = $dpac;
            $prevenus->mandataire = $mandataire;
            $prevenus->observation = null;
            $prevenus->date_observation = null;
            $prevenus->peine = null;
            if ($mandat_arret !== null) { // Vérifier si $mandat_arret est défini
                $fin_mandat = Carbon::createFromFormat('Y-m-d', $request->input('date_ecrou'))->addMonths($mandat_arret);
                $prevenus->date_fin_peine = $fin_mandat;
            }            $prevenus->remise_peine = null;
            $prevenus->date_fin_remise_peine = null;
            $prevenus->save();
            prevenus_historie::create( [
                'prevenus_id' => $prevenus->id,
                'situation' => $situation,
                'date_situation' => $date_ecrou,
                'status' => 'non jugé',
                'date_status' => $date_ecrou,
                'observation' =>  $prevenus->observation,
                'date_observation' => $prevenus->date_observation,

            ] );

            return redirect( '/index/tablePrevenus' );

        } else {
            session()->flash( 'message', 'modification echoué' );
            return redirect()->back();
        }

    }

    public function edith_information_prevenus( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ($prevenus->status !=="non jugé"){
            session()->flash( 'message', 'le prevenus est déjas jugé' );
            return redirect()->back();
        }
        else{
            return view( 'Prevenus.edith_information', compact( 'prevenus' ) );
        }
       
    }

    public function edith_prevenus_peine( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ( $prevenus ) {
            $peines = $request->input( 'peine' );
            $stringPeine = implode( ', ', $peines );
            $total_peine = array_sum( $peines );
            $date_ecrou = $prevenus->date_fin_peine;
            $date_ecrouFormat = Carbon::createFromFormat( 'Y-m-d', $date_ecrou );
            $date_sortie = $date_ecrouFormat->addMonths( $total_peine );
            $date_sortie_Finale = $date_sortie->format( 'Y-m-d' );
            $prevenus->remise_peine = $stringPeine;
            $prevenus->date_fin_remise_peine = $date_sortie_Finale;
            $prevenus->save();
            return redirect( '/index/tablePrevenus' );
        } else {
            session()->flash( 'message', 'remise pas effectuer' );
            return redirect()->back();
        }
    }

    public function afficheInfos( $id ) {
        $prevenus = prevenus::find( $id );
        return view( 'Prevenus.informationPrevenus', compact( 'prevenus' ) );
    }

    // verifier le status du prevenus si il est ne pas encore juger

    public function edith_prevenus( $id ) {
        $prevenus = prevenus::find( $id );
        // $status = $prevenus->status;

        return view( 'Prevenus.modifSituation', compact( 'prevenus' ) );
        // if ( $status === 'Detention préventive' ) {
        //     return view( 'Prevenus.modifSituation', compact( 'prevenus' ) );
        // }
        // if ( $status === 'non jugé' || $status === 'Cassassionnaire' || $status === 'Appelant' || $status === 'Opposant' || $status === 'Passager' ) {
        //     return view( 'Prevenus.modifPrevenus', compact( 'prevenus' ) );
        // }
    }

    
    // a verifier a propos de status
    public function edith_prevenus_blade_status($id){
        $prevenus = prevenus::find( $id );
        $status = $prevenus->status;
        if ( $status != 'non jugé' ) {
             return view( 'Prevenus.modifPrevenus', compact( 'prevenus' ) );
         }
        if ( $status = 'non jugé' ){
            session()->flash( 'message', 'le prevenus ne pas encore jugé' );
            return redirect()->back();
        }
    }

    public function Edith_Prevenus_1Status( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        $etat = $request->input( 'etat' );
        if ( $prevenus ) {
            return view( 'Prevenus.modifPrevenus_2eme', compact( 'prevenus', 'etat' ) );
        } else {
            session()->flash( 'message', 'modification echouer' );
            return redirect()->back();
        }

    }

    public function Edith_Prevenus_Status( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ( $prevenus ) {
            $prevenus->etat = $request->input( 'etat' );
            $prevenus->date_etat = $request->input( 'date_modif' );
            $prevenus->save();
            prevenus_historie::create( [
                'prevenus_id' => $id,
                'situation' => $prevenus->situation,
                'date_situation' =>  $prevenus->date_situation,
                'status' => $prevenus->status,
                'date_status' => $prevenus->date_status,
                'etat' => $request->input( 'etat' ),
                'date_etat' => $request->input( 'date_modif' ),
                'observation' =>  $prevenus->observation,
                'date_observation' => $prevenus->date_observation,

            ] );

            return redirect( '/index/tablePrevenus' );
        } else {
            session()->flash( 'message', 'modification echouer' );
            return redirect()->back();
        }

    }

    //return dans le view modif avec date de declaration

    

    public function Edith_Prevenus_Situation( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        $situation = $request->input( 'situation' );
        $date_modif = $request->input( 'date_modif' );
        if ( $prevenus ) {
            $prevenus->situation = $situation;
            $prevenus->date_situation = $date_modif;
            $prevenus->save();
            prevenus_historie::create( [
                'prevenus_id' => $id, 
                'status' => $prevenus->status,
                'date_status' => $prevenus->date_status,
                'situation' => $request->input( 'situation' ),
                'date_situation' => $request->input( 'date_modif' ),
                'etat' => $prevenus->etat,
                'date_etat' => $prevenus->date_etat,
                'observation' =>  $prevenus->observation,
                'date_observation' => $prevenus->date_observation,
            ] );
            return redirect( '/index/tablePrevenus' );
        } else {
            session()->flash( 'message', 'modification echouer' );
            return redirect()->back();
        }

    }

    // view de prolongation prevenus

    public function Edith_Prevenus_Prolongation( $id ) {
        $prevenus = prevenus::find( $id );
        if ($prevenus->status !== "non jugé"){
            session()->flash( 'message', 'le prevenus à été déjas jugé' );
            return redirect()->back();
        }

        else{
            $type = $prevenus->type;
            $typeArray  = explode( '/', $type );
            if ( $typeArray[0] === 'RP'|| $typeArray[0] === 'rp' || $typeArray[0] === 'Rp' || $typeArray[0] === 'rP' ) {
                return view('Prevenus.prolongation_RP', compact('prevenus'));
            }
            
            if ( $typeArray[0] === 'CO' || $typeArray[0] === 'Co' || $typeArray[0] === 'cO' || $typeArray[0] === 'co' ) {
                return view('Prevenus.prolongation_CO', compact('prevenus'));
            }

            if ( $typeArray[0] === 'CR' || $typeArray[0] === 'cr' || $typeArray[0] === 'Cr' || $typeArray[0] === 'cR' ) {
                return view('Prevenus.prolongation_CR', compact('prevenus'));
            }
        }

    }

    // insertion du date de prolongation
    public function Edith_Prevenus_Prolongation_RP( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ( $prevenus ) {
            if ( $prevenus->remise_peine >= 3 ) {
                session()->flash( 'message', 'le prevenus '.$prevenus->nom .' n° dossier '.$prevenus->numero.'/'.$prevenus->type .' a dejas reçu une prolongation de 3 mois' );
                return redirect()->back();
            } else {
                // dd($request->input('date_prolongation'), $request->input('date_prolongation_RP'));

                $date_prolongation = $request->input( 'date_prolongation' );
                $date_prolongation_RP = $request->input( 'date_prolongation_RP' );
                $date_fin_remise_peine = Carbon::createFromFormat( 'Y-m-d', $date_prolongation_RP )->addMonths( $date_prolongation );
                $prevenus->observation = 'prolonge de '.$request->input( 'date_prolongation' ).' mois';
                $prevenus->date_observation = $request->input( 'date_prolongation_RP' );
                $prevenus->remise_peine = $date_prolongation;
                $prevenus->date_fin_remise_peine = $date_fin_remise_peine;
                $prevenus->save();
                prevenus_historie::create([
                'prevenus_id' => $id,
                'status' => $prevenus->status,
                'date_status' => $prevenus->date_status,
                'situation' => $prevenus->situation,
                'etat' => $prevenus->etat,
                'date_etat' => $prevenus->date_etat,
                'date_situation' => $prevenus->date_situation,
                'observation' => 'prolonge de '.$request->input( 'date_prolongation' ).'',
                'date_observation' => $request->input( 'date_prolongation_RP' ),
                 ]);
                return redirect( '/index/tablePrevenus' );
            }
        }
    }

    public function Edith_Prevenus_Prolongation_CO( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ( $prevenus ) {
            if ( $prevenus->remise_peine >= 6 ) {
                session()->flash( 'message', 'le prevenus '.$prevenus->nom .' n° dossier '.$prevenus->numero.'/'.$prevenus->type .' a dejas reçu une prolongation de 6 mois' );
                return redirect()->back();
            } else {
                $date_prolongation = $request->input( 'date_prolongation' );
                $date_prolongation_RP = $request->input( 'date_prolongation_RP' );
                $date_fin_remise_peine = Carbon::createFromFormat( 'Y-m-d', $date_prolongation_RP )->addMonths( $date_prolongation );
                $prevenus->observation = 'prolonge de '.$request->input( 'date_prolongation' ).' mois';
                $prevenus->date_observation = $request->input( 'date_prolongation_RP' );
                $prevenus->remise_peine = $date_prolongation;
                $prevenus->date_fin_remise_peine = $date_fin_remise_peine;
                $prevenus->save();
                prevenus_historie::create([
                'prevenus_id' => $id,
                'status' => $prevenus->status,
                'date_status' => $prevenus->date_status,
                'situation' => $prevenus->situation,
                'date_situation' => $prevenus->date_situation,
                'etat' => $prevenus->etat,
                'date_etat' => $prevenus->date_etat,
                'observation' => 'prolonge de '.$request->input( 'date_prolongation' ).'',
                'date_observation' => $request->input( 'date_prolongation_RP' ),
                 ]);
                 return redirect( '/index/tablePrevenus' );
            }

        }
    }

    public function Edith_Prevenus_Prolongation_CR( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ( $prevenus ) {
            if ( $prevenus->remise_peine >= 12 ) {
                session()->flash( 'message', 'le prevenus '.$prevenus->nom .' n° dossier '.$prevenus->numero.'/'.$prevenus->type .' a dejas reçu une prolongation de 12 mois' );
                return redirect()->back();
            } else {
                $date_prolongation = $request->input( 'date_prolongation' );
                $date_prolongation_RP = $request->input( 'date_prolongation_RP' );
                $date_fin_remise_peine = Carbon::createFromFormat( 'Y-m-d', $date_prolongation_RP )->addMonths( $date_prolongation );
                $prevenus->observation = 'prolonge de '.$request->input( 'date_prolongation' ).' mois';
                $prevenus->date_observation = $request->input( 'date_prolongation_RP' );
                $prevenus->remise_peine = $date_prolongation;
                $prevenus->date_fin_remise_peine = $date_fin_remise_peine;
                $prevenus->save();
                prevenus_historie::create([
                'prevenus_id' => $id,
                'status' => $prevenus->status,
                'date_status' => $prevenus->date_status,
                'situation' => $prevenus->situation,
                'date_situation' => $prevenus->date_situation,
                'etat' => $prevenus->etat,
                'date_etat' => $prevenus->date_etat,
                'observation' => 'prolonge de '.$request->input( 'date_prolongation' ).'mois',
                'date_observation' => $request->input( 'date_prolongation_RP' ),
                 ]);
                 return redirect( '/index/tablePrevenus' );
            }

        }
    }

    // obtention du OTPCA ou OPCI

    public function Edith_Prevenus_OTPCA( $id ) {
        $prevenus = prevenus::find( $id );
        if ($prevenus->status !=="non jugé"){
            session()->flash('message', 'le prevenus à été déjas jugé');
                return redirect()->back();
        }

        else{
            $type = $prevenus->type;
            $typeArray  = explode( '/', $type );
            if ( $typeArray[0] === 'RP' || $typeArray[0] === 'rp' || $typeArray[0] === 'Rp' || $typeArray[0] === 'rP' || $typeArray[0] === 'CO' || $typeArray[0] === 'Co' || $typeArray[0] === 'cO' || $typeArray[0] === 'co' ) {
                session()->flash( 'message', 'le prevenus '.$prevenus->nom .' n° dossier '.$prevenus->numero.'/'.$prevenus->type .' ne peut pas avoir faire cette action' );
                return redirect()->back();
            }

            if ( $typeArray[0] === 'CR' || $typeArray[0] === 'cr' || $typeArray[0] === 'Cr' || $typeArray[0] === 'cR' ) {
                return view( 'Prevenus.prolongation_OTPCA', compact( 'prevenus' ) );
            }
        }
        
    }

    public function Edith_Prevenus_OTPCA_CO( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ( $prevenus ) {
            $age = $prevenus->age;
            $date_modif = $request->input( 'date_modif' );
            // $OTPCA_ou_OPCI;
            if ( $request->input( 'OTPCA' ) === 'OTPCA' ) {
                $OTPCA_ou_OPCI = 12;
            }
            if ( $request->input( 'OTPCA' ) === 'OPCI' && $age === 'majeur' ) {
                $OTPCA_ou_OPCI = 30;
            }
            if ( $request->input( 'OTPCA' ) === 'OPCI' && $age === 'mineur' ) {
                $OTPCA_ou_OPCI = 12;
            }
            $prevenus->observation = $request->input( 'OTPCA' );
            $prevenus->date_observation = $request->input( 'date_modif' );
            $prevenus->date_fin_remise_peine = Carbon::createFromFormat( 'Y-m-d', $date_modif )->addMonths( $OTPCA_ou_OPCI );
            $prevenus->save();
            prevenus_historie::create([
                'prevenus_id' => $id,
                'status' => $prevenus->status,
                'date_status' => $prevenus->date_status,
                'situation' => $prevenus->situation,
                'date_situation' => $prevenus->date_situation,
                'etat' => $prevenus->etat,
                'date_etat' => $prevenus->date_etat,
                'observation' =>  $request->input( 'OTPCA' ),
                'date_observation' => $date_modif = $request->input( 'date_modif' ),
                 ]);
            return redirect( '/index/tablePrevenus' );
        }
    } 

    public function Edith_Prevenus_Apres_ugement_veifier( $id ) {
        $prevenus = prevenus::find( $id );
        $status = $prevenus->status;
        return view( 'Prevenus.verificationPrevenus', compact( 'prevenus' ) );

        // if ( $status === 'non jugé' ) {
        //     return view( 'Prevenus.verificationPrevenus', compact( 'prevenus' ) );
        // }
    }

    public function Edith_Prevenus_Apres_ugement_veification( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        $statut = $request->input( 'status' );

        if ( $statut === 'Emprisonnement' || $statut === 'Travaux Force' ) {
            return view( 'Prevenus.modification_apres_jugement', compact( 'prevenus', 'statut' ) );
        }
        if ( $statut === 'Detention préventive' ) {
            return view( 'Prevenus.modification_apres_jugementPrevenus', compact( 'prevenus', 'statut' ) );
        }

        if ( $statut === 'Travaux Force à perpétuité' || $statut === 'peine de mort' ) {
            return view( 'Prevenus.viewSansPeine', compact( 'prevenus', 'statut' ) );
        }
        if ( $statut === 'Libérè' ) {
            return view( 'Prevenus.viewLiberer', compact( 'prevenus', 'statut' ) );
            }

        }

        public function affiche_historique_prevenus($id){
            $prevenuses = prevenus_historie::where('prevenus_id',$id)->get();
            if ($prevenuses){
                return view('Prevenus.historique_prevenus',compact('prevenuses'));
            }
            else{
                session()->flash('message', 'le prevenus n\'a pas de historique');
                return redirect()->back();
            }
            
        }

        public function suppression_prevenus($id, Request $request){
            $nom = $request->input('nom');
            $mot_de_pass = $request->input('mot_de_pass');

            $utilisateur = utilisateur::where('nom', $nom)->first();
            if ($utilisateur && Hash::check($mot_de_pass, $utilisateur->password)) {
                $prevenus = prevenus::find($id);
                $cheminImg = public_path( $prevenus->photo );
                echo "$cheminImg";
                $prevenus->delete();
                unlink( $cheminImg );
                return redirect('/index/tablePrevenus');
            } else {
                session()->flash('message', 'suppression echoué');
                return redirect()->back();
            }
        }
    }
