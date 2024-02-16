<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\condamner;
use App\Models\prevenus;
use App\Models\liberer;
use App\Models\condamner_historie;
use App\Models\prevenus_historie;
use App\Models\utilisateur;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\File;
//latest()

class CondamnerController extends Controller {
    public function ajoutManuel( Request $request ) {
        // dd( $request->all() );
        $dateActuelle = Carbon::now();
        $ecrou_prevenus = $request->input( 'ecrou_prevenus' );
        $numero = $request->input( 'numero' );
        $type = $request->input( 'type' ) ;
        $nom = $request->input( 'nom' );
        $datenaissance1 = $request->input( 'date_naissance1' );
        $datenaissance2 = $request->input( 'date_naissance2' );
        $nationalite = $request->input( 'nationalite' );
        $mere = $request->input( 'mere' );

        $status = $request->input( 'status' );
        $categorie = 'condamner';
        $situation = $request->input( 'situation' );
        $sexe = $request->input( 'sexe' );
        $photo = $request->file( 'photo' );

        // if ( $request->hasFile( 'photo' ) && $photo->isValid() ) {
        //     $monPhoto = time().'.'.$photo->getClientOriginalExtension();
        //     $chemin = public_path( '/imgCondamner' );
        //     $photo->move( $chemin, $monPhoto );
        // } else {
        //     echo 'photo manquante ou non valide';
        // }
        $mandataire = $request->input( 'mandataire' );
        $inculpations = $request->input( 'inculpation' );

        if ( is_array( $inculpations ) && count( $inculpations ) > 1 ) {
            $dpac = 'DPAC';
        } else {
            $dpac = null;
        }
        $peines = $request->input( 'peine' );
        $unites_peine = $request->input( 'unite_peine' );
        $stringUnite_peine = implode( ',', $unites_peine );
        $stringPeine = implode( ',', $peines );
        $stringInculpation = implode( ',', $inculpations );
        $total_peine = array_sum( $peines );
        $date_ecrou = $request->input( 'date_ecrou' );
        $date_ecrouFormat = Carbon::createFromFormat( 'Y-m-d', $date_ecrou );
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
        // $mandat_arret = null;
        // if ( !is_array( $type ) ) {
        //     $typeArray  = explode( '/', $type );
        //     if ( count( $typeArray ) > 0 ) {
        //         if ( $typeArray[ 0 ] === 'RP' || $typeArray[ 0 ] === 'rp' || $typeArray[ 0 ] === 'Rp' || $typeArray[ 0 ] === 'rP' ) {
        //             $mandat_arret = 3;
        //         } elseif ( $typeArray[ 0 ] === 'CO' || $typeArray[ 0 ] === 'Co' || $typeArray[ 0 ] === 'cO' || $typeArray[ 0 ] === 'co' ) {
        //             $mandat_arret = 6;
        //         } elseif ( $typeArray[ 0 ] === 'CR' || $typeArray[ 0 ] === 'cr' || $typeArray[ 0 ] === 'Cr' || $typeArray[ 0 ] === 'cR' ) {
        //             $mandat_arret = 8;
        //         }
        //     }
        // }
        $condamner = new condamner();
        if ( $condamner ) {
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
            $condamner->ecrou_prevenus = $ecrou_prevenus;
            $condamner->numero = $numero;
            $condamner->type = $type;
            $condamner->nom = $nom;
            $condamner->prenom = $prenom;
            $condamner->naissance = $dateNaissance_table;
            $condamner->lieu = $lieu;
            $condamner->cartier = $cartier;
            $condamner->district = $district;
            $condamner->region = $region;
            $condamner->commune = $commune;
            $condamner->nationalité = $nationalite;
            $condamner->cin = $cin;
            $condamner->date_delivrance = $date_delivrance;
            $condamner->profession = $profession;
            $condamner->pere = $pere;
            $condamner->mere = $mere;
            $condamner->marié = $marie;
            $condamner->enfant = $enfant;
            $condamner->adresse = $adresse;
            $condamner->cartier1 = $cartier1;
            $condamner->district1 = $district1;
            $condamner->region1 = $region1;
            $condamner->commune1 = $commune1;
            $condamner->contacte = $contact;
            $condamner->categorie = $categorie;
            $condamner->status = $status;
            $condamner->date_status = $date_ecrou;
            $condamner->situation = $situation;
            $condamner->date_situation = $date_ecrou;
            $condamner->sexe = $sexe;
            if ( $request->hasFile( 'photo' ) && $photo->isValid() ) {
                $monPhoto = time().'.'.$photo->getClientOriginalExtension();
                $chemin = public_path( '/imgCondamner' );
                $photo->move( $chemin, $monPhoto );
            } else {
                $imageDefaultCounter =  1;

                $monPhoto = 'image_default_' . $imageDefaultCounter . '.jpg';
                $imageDefaultPath = public_path( 'image_Default/image_default.jpg' );
                while ( file_exists( public_path( '/imgCondamner/' . $monPhoto ) ) ) {
                    $imageDefaultCounter++;
                    $monPhoto = 'image_default_' . $imageDefaultCounter . '.jpg';
                }
                $destinationPath = public_path( '/imgCondamner/'.$monPhoto );
                copy( $imageDefaultPath, $destinationPath );
            }

            if ( $AgeCond < 18 ) {

                $condamner->age = 'mineur';
            } else {
                $condamner->age = 'majeur';
            }
            $peines_par_inculpation = [];
            foreach ( $inculpations as $key => $inculpation ) {
                $peines_par_inculpation[ $inculpation ] = [
                    'peine' => $peines[ $key ],
                    'unite_peine' => $unites_peine[ $key ],
                ];
            }

            $total_peine = 0;
            $date_sortie = Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_ecrou' ) );

            foreach ( $peines_par_inculpation as $inculpation_data ) {
                $total_peine += $inculpation_data[ 'peine' ];

                if ( $inculpation_data[ 'unite_peine' ] === 'jour' ) {
                    $date_sortie->addDays( $inculpation_data[ 'peine' ] );
                } elseif ( $inculpation_data[ 'unite_peine' ] === 'mois' ) {
                    $date_sortie->addMonths( $inculpation_data[ 'peine' ] );
                }
            }
            $condamner->ageDate = $AgeCond;
            $condamner->date_ecrou = $date_ecrou;
            $condamner->photo = basename( $monPhoto );
            $condamner->inculpation = $stringInculpation;
            $condamner->classification = $dpac;
            $condamner->peine = $stringPeine;
            // if ( $mandat_arret !== null ) {
            // Vérifier si $mandat_arret est défini
            //     $fin_mandat = Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_ecrou' ) )->addMonths( $mandat_arret );
            //     $condamner->date_fin_peine = $fin_mandat;
            // }
            $condamner->date_fin_peine = $date_sortie;
            $condamner->unite_peine = $stringUnite_peine;
            $condamner->mandataire = $mandataire;
            $condamner->observation = null;
            $condamner->date_observation = null;
            $condamner->remise_peine = null;
            $condamner->unite_remise_peine = null;
            $condamner->date_fin_remise_peine = null;
            $condamner->save();
            condamner_historie::create( [
                'condamner_id' => $condamner->id,
                'status' => $request->input( 'status' ),
                'date_status' => $request->input( 'date_ecrou' ),
                'situation' => $situation,
                'date_situation' => $request->input( 'date_ecrou' ),
                'observation' =>  $condamner->observation,
                'date_observation' => $condamner->date_observation,
            ] );
            if ( $condamner->save() ) {
                return redirect( '/index/tableCondamner' );
            } else {
                session()->flash( 'message', 'operation ajout à ete interropus' );
                return redirect()->back();
            }
        } else {
            session()->flash( 'message', 'ajout pour condamnation a été intorronpus' );
            return redirect()->back();
        }
    }

    public function Liberation( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ( $prevenus ) {
            $dateActuelle = Carbon::now();
            $numero_ecrou_prevenus = $prevenus->id;
            $numero = $prevenus->numero;
            $type = $prevenus->type;
            $nom = $prevenus->nom;
            $prenom = $prevenus->prenom;
            $datenaissance = $prevenus->naissance;

            if ( $datenaissance ) {
                if ( strpos( $datenaissance, '-' ) !== false ) {
                    $dateNaissance = Carbon::createFromFormat( 'Y-m-d H:i:s', $datenaissance );
                } else {
                    $dateNaissance = Carbon::create( $datenaissance, 1, 1 );
                }
            } else {
                $dateNaissance = Carbon::create( $prevenus->naissance, 1, 1 );
            }
            $AgeCond = $dateNaissance->diffInYears( $dateActuelle );

            $lieu = $prevenus->lieu;
            $cartier = $prevenus->cartier;
            $region = $prevenus->region;
            $commune = $prevenus->commune;
            $district = $prevenus->district;
            $nationalite = $prevenus->nationalité;
            $cin = $prevenus->cin;
            $date_delivrance = $prevenus->date_delivrance;
            $profession = $prevenus->profession;
            $pere = $prevenus->pere;
            $mere = $prevenus->mere;
            $marie = $prevenus->marié;
            $enfant = $prevenus->enfant;
            $adresse = $prevenus->adresse;
            $cartier1 = $prevenus->cartier1;
            $region1 = $prevenus->region1;
            $commune1 = $prevenus->commune1;
            $district1 = $prevenus->district1;
            $contact = $prevenus->contacte;
            $date_ecrou = $prevenus->date_ecrou;
            $date_condamnation = null;
            $sexe = $prevenus->sexe;
            $categorie = $prevenus->categorie;
            $status = $request->input( 'status' );
            $cheminImg = public_path( $prevenus->photo );
            File::makeDirectory( public_path( 'temp' ), $mode = 0755, true, true );
            // dd( $cheminImg );

            if ( file_exists( $cheminImg ) ) {
                $monPhoto = public_path( 'temp/' . time() . '.' . pathinfo( $prevenus->photo, PATHINFO_EXTENSION ) );
                copy( $cheminImg, $monPhoto );
                echo 'photo valide';
            } else {
                echo 'photo manquante ou non valide';
            }
            $mandataire = $prevenus->mandataire;
            $observation = $prevenus->observation;
            $inculpation = $prevenus->inculpation;
            $date_liberation = Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_liberation' ) );

            $liberer = new liberer();
            if ( $liberer ) {
                $liberer->ecrou_prevenus = $numero_ecrou_prevenus;
                $liberer->numero = $numero;
                $liberer->type = $type;
                $liberer->nom = $nom;
                $liberer->prenom = $prenom;
                $liberer->naissance = $datenaissance;
                $liberer->lieu = $lieu;
                $liberer->cartier = $cartier;
                $liberer->region = $region;
                $liberer->commune = $commune;
                $liberer->district = $district;
                $liberer->nationalité = $nationalite;
                $liberer->cin = $cin;
                $liberer->date_delivrance = $date_delivrance;
                $liberer->profession = $profession;
                $liberer->pere = $pere;
                $liberer->mere = $mere;
                $liberer->marié = $marie;
                $liberer->enfant = $enfant;
                $liberer->adresse = $adresse;
                $liberer->cartier1 = $cartier1;
                $liberer->region1 = $region1;
                $liberer->commune1 = $commune1;
                $liberer->district1 = $district1;
                $liberer->contacte = $contact;
                $liberer->categorie = $categorie;
                $liberer->status = $status;
                $liberer->sexe = $sexe;

                if ( $AgeCond < 18 ) {

                    $liberer->age = 'mineur';
                } else {
                    $liberer->age = 'majeur';
                }

                $liberer->ageDate = $AgeCond;
                $liberer->date_liberation = $date_liberation;
                $liberer->date_ecrou = $date_ecrou;
                $liberer->date_condamnation = $date_condamnation;
                $liberer->photo = basename( $monPhoto );
                $liberer->mandataire = $mandataire;
                $liberer->observation = $observation;
                $liberer->inculpation = $inculpation;
                $liberer->save();
                prevenus_historie::create( [
                    'prevenus_id' => $id,
                    'status' => $request->input( 'status' ),
                    'date_status' => $request->input( 'date_liberation' ),
                    'situation' => $liberer->situation,
                    'date_situation' =>  $liberer->date_situation,
                    'observation' =>  $prevenus->observation,
                    'date_observation' => $prevenus->date_observation,
                ] );
                unlink( $cheminImg );
                $prevenus->delete();
                return redirect( '/index/tableLiberer' );

            }

        } else {
            session()->flash( 'message', 'ajout pour condamnation a été intorronpus' );
            return redirect()->back();
        }

    }

    public function peine_mort_perpetuite( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ( $prevenus ) {
            $dateActuelle = Carbon::now();
            $datenaissance = $prevenus->naissance;
            if ( $datenaissance ) {
                if ( strpos( $datenaissance, '-' ) !== false ) {
                    $dateNaissance = Carbon::createFromFormat( 'Y-m-d H:i:s', $datenaissance );
                } else {
                    $dateNaissance = Carbon::create( $datenaissance, 1, 1 );
                }
            } else {
                $dateNaissance = Carbon::create( $prevenus->naissance, 1, 1 );
            }

            $AgeCond = $dateNaissance->diffInYears( $dateActuelle );
            if ( $AgeCond < 18 ) {

                $prevenus->age = 'mineur';
            } else {
                $prevenus->age = 'majeur';
            }
            $sexe = $prevenus->sexe;
            $status = $request->input( 'status' );
            $situation = 'en detention(e)';
            $inculpations = $request->input( 'inculpation' );
            $stringInculpation = implode( ', ', $inculpations );

            if ( is_array( $inculpations ) && count( $inculpations ) > 1 ) {
                $dpac = 'DPAC';
            } else {
                $dpac = null;
            }
            $date_ecrou = Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_ecrou' ) );
            $prevenus->ageDate = $AgeCond;
            $prevenus->status = $status;
            $prevenus->date_status = $date_ecrou;
            $prevenus->situation = $situation;
            $prevenus->date_situation = $date_ecrou;
            $prevenus->etat = null;
            $prevenus->date_etat = null;
            $prevenus->sexe = $sexe;
            $prevenus->inculpation = $stringInculpation;
            $prevenus->classification = $dpac;
            $prevenus->peine = null;
            $prevenus->unite_peine = null;
            $prevenus->date_fin_peine = null;
            $prevenus->remise_peine = null;
            $prevenus->unite_remise_peine = null;
            $prevenus->remise_peine = null;
            $prevenus->unite_remise_peine = null;
            $prevenus->date_fin_remise_peine = null;
            $prevenus->save();
            prevenus_historie::create( [
                'prevenus_id' => $prevenus->id,
                'status' => $request->input( 'status' ),
                'date_status' => $date_ecrou,
                'etat' => $prevenus->etat,
                'date_etat' => $prevenus->date_etat,
                'situation' => $situation,
                'date_situation' => $date_ecrou,
                'observation' =>  $prevenus->observation,
                'date_observation' => $prevenus->date_observation,
            ] );
            return redirect( '/index/tablePrevenus' );

        } else {
            session()->flash( 'message', 'ajout pour condamnation a été intorronpus' );
            return redirect()->back();
        }

    }

    public function ajoutPrevenusPreventive( $id, Request $request ) {
        $prevenus = Prevenus::find( $id );

        if ( $prevenus ) {
            $dateActuelle = Carbon::now();
            $datenaissance = $prevenus->naissance;
            if ( $datenaissance ) {
                if ( strpos( $datenaissance, '-' ) !== false ) {

                    $dateNaissance = Carbon::createFromFormat( 'Y-m-d H:i:s', $datenaissance );
                } else {
                    $dateNaissance = Carbon::create( $datenaissance, 1, 1 );
                }
            } else {
                $dateNaissance = Carbon::create( $prevenus->naissance, 1, 1 );
            }
            $AgeCond = $dateNaissance->diffInYears( $dateActuelle );
            $inculpations = $request->input( 'inculpation' );
            $peines = $request->input( 'peine' );
            $unites_peine = $request->input( 'unite_peine' );

            if ( is_array( $inculpations ) && count( $inculpations ) > 1 ) {
                $dpac = 'DPAC';
            } else {
                $dpac = null;
            }
            $peines_par_inculpation = [];
            foreach ( $inculpations as $key => $inculpation ) {
                $peines_par_inculpation[ $inculpation ] = [
                    'peine' => $peines[ $key ],
                    'unite_peine' => $unites_peine[ $key ],
                ];
            }

            $total_peine = 0;
            $date_sortie = Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_ecrou' ) );

            // Parcourir chaque inculpation et mettre à jour le total de peine et la date de sortie
            foreach ( $peines_par_inculpation as $inculpation_data ) {
                $total_peine += $inculpation_data[ 'peine' ];

                if ( $inculpation_data[ 'unite_peine' ] === 'jour' ) {
                    $date_sortie->addDays( $inculpation_data[ 'peine' ] );
                } elseif ( $inculpation_data[ 'unite_peine' ] === 'mois' ) {
                    $date_sortie->addMonths( $inculpation_data[ 'peine' ] );
                }
            }

            // Mettre à jour les informations du prévenu
            if ( $AgeCond < 18 ) {

                $prevenus->age = 'mineur';
            } else {
                $prevenus->age = 'majeur';
            }
            $prevenus->ageDate = $AgeCond;
            $prevenus->status = $request->input( 'status' );
            $prevenus->etat = null;
            $prevenus->date_etat = null;
            $prevenus->date_status =  Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_ecrou' ) );
            $prevenus->situation = 'en detention(e)';
            $prevenus->date_situation =  Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_ecrou' ) );
            $prevenus->inculpation = implode( ', ', $inculpations );
            $prevenus->classification = $dpac;
            ;
            $prevenus->peine = implode( ', ', $peines );
            $prevenus->unite_peine = implode( ', ', $unites_peine );
            $prevenus->date_fin_peine = $date_sortie->format( 'Y-m-d' );
            $prevenus->remise_peine = null;
            $prevenus->unite_remise_peine = null;
            $prevenus->date_fin_remise_peine = null;
            $prevenus->save();

            prevenus_historie::create( [
                'prevenus_id' => $id,
                'status' => $request->input( 'status' ),
                'date_status' => $request->input( 'date_ecrou' ),
                'etat' => $prevenus->etat,
                'date_etat' => $prevenus->date_etat,
                'situation' => 'en detention(e)',
                'date_situation' => $request->input( 'date_ecrou' ),
                'observation' =>  $prevenus->observation,
                'date_observation' => $prevenus->date_observation,
            ] );
            if ( $prevenus->save() ) {
                return redirect( '/index/tablePrevenus' );
            }
        } else {
            session()->flash( 'message', 'operation ajout à ete interropus' );
            return redirect()->back();
        }

    }

    public function ajoutCondamner( $id, Request $request ) {
        $prevenus = prevenus::find( $id );
        if ( $prevenus ) {
            $dateActuelle = Carbon::now();
            $datenaissance = $prevenus->naissance;
            if ( $datenaissance ) {
                // Vérifie si la date est au format 'Y-m-d'
                if ( strpos( $datenaissance, '-' ) !== false ) {
                    $dateNaissance = Carbon::createFromFormat( 'Y-m-d H:i:s', $datenaissance );
                } else {
                    // Si la date est seulement une année, utilise une date par défaut avec cette année
                    $dateNaissance = Carbon::create( $datenaissance, 1, 1 );
                }
            } else {
                // Si $datenaissance est vide, utilise une date par défaut avec l'année actuelle
                            $dateNaissance = Carbon::create( $prevenus->naissance, 1, 1 );
                        }
                    $AgeCond = $dateNaissance->diffInYears( $dateActuelle );
                    if ( $AgeCond < 18 ) {

                        $prevenus->age = 'mineur';
                    } else {
                        $prevenus->age = 'majeur';
                    }
                    $inculpations = $request->input( 'inculpation' );
                    $peines = $request->input( 'peine' );
                    $unites_peine = $request->input( 'unite_peine' );

                    if (is_array($inculpations) && count($inculpations) > 1) {
                        $dpac = 'DPAC';
                    } else {
                        $dpac = null;
                    }
                    // Créer un tableau associatif où chaque inculpation est associée à sa peine et son unité de peine
                    $peines_par_inculpation = [];
                    foreach ( $inculpations as $key => $inculpation ) {
                        $peines_par_inculpation[ $inculpation ] = [
                            'peine' => $peines[ $key ],
                            'unite_peine' => $unites_peine[ $key ],
                        ];
                    }

                    // Initialiser les variables pour le calcul total de peine et la date de sortie
                    $total_peine = 0;
                    $date_sortie = Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_ecrou' ) );

                    // Parcourir chaque inculpation et mettre à jour le total de peine et la date de sortie
                    foreach ( $peines_par_inculpation as $inculpation_data ) {
                        $total_peine += $inculpation_data[ 'peine' ];

                        if ( $inculpation_data[ 'unite_peine' ] === 'jour' ) {
                            $date_sortie->addDays( $inculpation_data[ 'peine' ] );
                        } elseif ( $inculpation_data[ 'unite_peine' ] === 'mois' ) {
                            $date_sortie->addMonths( $inculpation_data[ 'peine' ] );
                        }
                    }

                    // Mettre à jour les informations du prévenu
                    $prevenus->ageDate = $AgeCond;
                    $prevenus->status = $request->input( 'status' );
                    $prevenus->date_status = Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_ecrou' ) );
                    $prevenus->situation = 'en detention(e)';
                    $prevenus->etat = null;
                    $prevenus->date_etat = null;
                    $prevenus->date_situation =Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_ecrou' ) );
                    $prevenus->inculpation = implode( ', ', $inculpations );
                    $prevenus->classification = $dpac;
                    $prevenus->peine = implode( ', ', $peines );
                    $prevenus->unite_peine = implode( ', ', $unites_peine );
                    $prevenus->date_fin_peine = $date_sortie->format( 'Y-m-d' );
                    $prevenus->remise_peine = null;
                    $prevenus->unite_remise_peine = null;
                    $prevenus->date_fin_remise_peine = null;
                    $prevenus->save();
                    prevenus_historie::create( [
                        'prevenus_id' => $id,
                        'status' => $request->input( 'status' ),
                        'date_status' => $request->input( 'date_ecrou' ),
                        'etat' => $prevenus->etat,
                        'date_etat' => $prevenus->date_etat,
                        'situation' => 'en detention(e)',
                        'date_situation' => $request->input( 'date_ecrou' ),
                        'observation' =>  $prevenus->observation,
                        'date_observation' => $prevenus->date_observation,
                    ] );
                    return redirect( '/index/tablePrevenus' );
                } else {
                    session()->flash( 'message', 'operation ajout à ete interropus' );
                    return redirect()->back();
                }

            }

            public function affice_condamner( $id ) {
                $condamners = condamner::find( $id );
                return view( 'Condamner.information', compact( 'condamners' ) );
            }

            public function affice_condamner_historique( $id ) {
                $condamners = condamner_historie::where( 'condamner_id',  $id )->get();
                if ($condamners){
                    return view( 'Condamner.historique', compact( 'condamners' ) );
                }
                else {
                    session()->flash( 'message', 'condamner n\'a pas des historiques' );
                    return redirect()->back();
                }
            }

            public function modif_condamner( $id ) {
                $condamner = condamner::find( $id );
                return view( 'Condamner.modifCondamner', compact( 'condamner' ) );
            }

            public function remise_condamner( $id ) {
                $condamner = condamner::find( $id );
                
                if ($condamner->status == 'Travaux Force à perpétuité' || $condamner->status == 'peine de mort'){
                    session()->flash( 'message', 'condamner ne peux pas faire une remise de peine' );
                    return redirect()->back();
                }
                else{
                return view( 'Condamner.remiser', compact( 'condamner' ) );
            }
            }

            public function modifSitu_condamner( $id, Request $request ) {
                $condamner = condamner::find( $id );
                $situation = $request->input( 'situation' );
                if ( $situation === 'en detention(e)' || $situation === 'Evadé(e)' || $situation === 'Décès(e)' || $situation === 'Hospitalisè(e)' ) {
                    return view( 'Condamner.modifSituation', compact( 'condamner', 'situation' ) );
                }
            } 

            public function modifSitu_condamner_Situation( $id, Request $request ) {
                $condamner = condamner::find( $id );
                $date_status = $condamner->date_status;
                $situation = $request->input( 'situation' );
                $date_modif = Carbon::createFromFormat( 'Y-m-d', $request->input( 'date_modif' ) );
                if ( $condamner ) {
                    if ( $situation === 'en detention(e)' ) {
                        $condamner->situation = $situation;
                        $condamner->date_situation = $date_modif;
                        $condamner->save();
                condamner_historie::create( [
                    'condamner_id' => $id,
                    'status' => $condamner->status,
                    'date_status' => $date_status,
                    'situation' => $request->input( 'situation' ),
                    'date_situation' => $date_modif,
                    'observation' =>  $condamner->observation,
                    'date_observation' => $condamner->date_observation,
                ] );

                return redirect( 'index/tableCondamner' );
            }
            if ( $situation === 'Evadé(e)' || $situation === 'Décès(e)' || $situation === 'Hospitalisè(e)' ) {
                $condamner->situation = $situation;
                $condamner->date_situation = $date_modif;
                $condamner->save();
                // Enregistrement de l'historique
                condamner_historie::create( [
                    'condamner_id' => $id,
                    'status' => $condamner->status,
                    'date_status' => $date_status,
                    'situation' => $request->input( 'situation' ),
                    'date_situation' => $date_modif,
                    'observation' =>  $condamner->observation,
                    'date_observation' => $condamner->date_observation,
                ] );
                return redirect( 'index/tableEvader' );
            }

        }
    }

    public function remise_condamner_peine( $id, Request $request ) {
        $condamner = Condamner::find( $id );

        if ( $condamner ) {
            $peines = $request->input( 'peine' );
            $unites_peine = $request->input( 'unite_peine' );
            $stringPeine = implode( ', ', $peines );
            $stringUnite_remise_peine = implode( ', ', $unites_peine );
            $total_peine = array_sum( $peines );
            $date_ecrou = $condamner->date_fin_remise_peine ?? $condamner->date_fin_peine;
            $date_ecrouFormat = Carbon::createFromFormat( 'Y-m-d', $date_ecrou );

            $peines_par_inculpation = [];
            foreach ( $peines as $key => $peine ) {
                $peines_par_inculpation[ $key ] = [
                    'peine' => $peine,
                    'unite_peine' => $unites_peine[ $key ],
                ];
            }

            $total_peine = 0;
            $date_sortie = clone $date_ecrouFormat;

            foreach ( $peines_par_inculpation as $peine_data ) {
                $total_peine += $peine_data[ 'peine' ];

                if ( $peine_data[ 'unite_peine' ] === 'jour' ) {
                    $date_sortie->subDays( $peine_data[ 'peine' ] );
                } elseif ( $peine_data[ 'unite_peine' ] === 'mois' ) {
                    $date_sortie->subMonths( $peine_data[ 'peine' ] );
                }
            }

            // Ajouter la remise de peine
            $condamner->remise_peine = $stringPeine;
            $condamner->unite_remise_peine = $stringUnite_remise_peine;
            $condamner->date_fin_remise_peine = $date_sortie->format( 'Y-m-d' );
            $condamner->save();
            return redirect( '/index/tableCondamner' );
        } else {
            session()->flash( 'message', 'remise pas effectuer' );
            return redirect()->back();
        }

    }

    public function affich_Evader( $id ) {
        $condamners = condamner::find( $id );
        return view( 'Evader.information_Evader', compact( 'condamners' ) );
    }

    // suppresion condamne

    public function suppression_Condamner( $id, Request $request ) {
        $nom = $request->input('nom');
        $mot_de_pass = $request->input( 'mot_de_pass' );

        $utilisateur = utilisateur::where('nom', $nom)->first();
        if ( $utilisateur && Hash::check( $mot_de_pass, $utilisateur->password ) ) {
            $condamner = condamner::find( $id );
            $cheminImg = public_path( '/imgCondamner/'.$condamner->photo );

            $condamner->delete();
            unlink( $cheminImg );
            return redirect( '/index/tableCondamner' );
        } else {
            session()->flash( 'message', 'suppression echoué' );
            return redirect()->back();
        }
    }

    public function suppression_Liberer($id, Request $request){
        $nom = $request->input('nom');
        $mot_de_pass = $request->input( 'mot_de_pass' );

        $utilisateur = utilisateur::where('nom', $nom)->first();
        if ( $utilisateur && Hash::check( $mot_de_pass, $utilisateur->password ) ) {
            $Liberer = liberer::find($id);
            $cheminImg = public_path( '/temp/'.$Liberer->photo );

            $Liberer->delete();
            unlink( $cheminImg );
            return redirect('/index/tableLiberer');
        } else {
            session()->flash( 'message', 'suppression echoué' );
            return redirect()->back();
        }
    }

    public function Condamner_libere( $id ) {
        $condamners = condamner::find( $id );
        return view( 'tous.condamner_Lib', compact( 'condamners' ) );
    }

    public function liberation_condition_view($id){
        $condamner = condamner::find($id);
        return view('Condamner.caondamner_conditionnele',compact('condamner'));
    }
}