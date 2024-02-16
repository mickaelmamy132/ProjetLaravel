<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\prevenus;
use App\Models\condamner;
use App\Models\condamner_historie;
use Carbon\Carbon;
 
class TransferCondamner extends Command {
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'transferCondamner';
 
    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'transfers des prevenus vers la table condamner';

    /**
    * Execute the console command.
    *
    * @return int
    */

    public function handle() {
     
        
    $dateLimite = null;

    $prevenu = Prevenus::all(); 

    foreach ($prevenu as $prevenuss) {

        $type = $prevenuss->type;
        $typeArray = explode('/', $type);
        
        $lowercaseType = strtolower($typeArray[0]);
        
        if (in_array($lowercaseType, ['rp', 'co', 'cr'])) {
            switch ($lowercaseType) {
                case 'rp':
                    // $var = 10;
                    $dateLimite = Carbon::now()->subWeekdays(9)->toDateString();
                    break;
                case 'co':
                    // $var = 5;
                    $dateLimite = Carbon::now()->subWeekdays(4)->toDateString();
                    break;
                case 'cr':
                    // $var = 3;
                    $dateLimite = Carbon::now()->subDays(2)->toDateString();
                    break;
            }
        }
                
        if ($dateLimite !== null) {
            $prevenuses = Prevenus::whereDate('date_status', '<', $dateLimite)
                ->where(function ($query) {
                    $query->where('status', 'Emprisonnement')
                        ->orWhere('status', 'Detention préventive')
                        ->orWhere('status', 'Travaux Force')
                        ->orWhere('status', 'Travaux Force à perpétuité')
                        ->orWhere('status', 'peine de mort');
                })
                ->whereNull('etat')
                ->get();

                foreach ( $prevenuses as $prevenus ) {
                    $dateActuelle = Carbon::now();
                    $numero_ecrou_prevenus = $prevenus->id;
                    $numero = $prevenus->numero;
                    $type = $prevenus->type;
                    $nom = $prevenus->nom;
                    $prenom = $prevenus->prenom;
                    $datenaissance = $prevenus->naissance;
                    
                    $domicile = $prevenus->lieu;
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
                    $categorie = 'condamner';
                    $sexe = $prevenus->sexe;
                    $status = $prevenus->status;
                    $date_status = $prevenus->date_status;
                    $situation = $prevenus->situation;
                    $cheminImg = public_path( $prevenus->photo );
        
                    if ( file_exists( $cheminImg ) ) {
                        $monPhoto = public_path( 'imgCondamner/' . time() . '.' . pathinfo( $prevenus->photo, PATHINFO_EXTENSION ) );
                        copy( $cheminImg, $monPhoto );
                        echo 'photo valide';
                    } else {
                        echo 'photo manquante ou non valide';
                    }
                    $inculpations = explode(',', $prevenus->inculpation);
                    $classification = $prevenus->classification;
                    $observation = $prevenus->observation;
                    $mandataire = $prevenus->mandataire;
                    $peines = explode(',', $prevenus->peine);
                    $unite_peine = $prevenus->unite_peine;
        
                    $stringPeine = implode( ',', $peines );
                    $stringInculpation = implode( ',', $inculpations );
                    $date_ecrou = $prevenus->date_ecrou;
                    $date_situation = $prevenus->date_situation;
                    $date_fin_peine = $prevenus->date_fin_peine;
        
                    $condamner = new condamner();
                    if ( $condamner ) {
                        if ($datenaissance) {
                            if (strpos($datenaissance, '-') !== false) {
                                $dateNaissance = Carbon::createFromFormat('Y-m-d H:i:s', $datenaissance);
                            } else {
                                $dateNaissance = Carbon::create( $datenaissance, 1, 1 );
                            }
                        } else {
                            $dateNaissance = Carbon::create( $prevenus->naissance, 1, 1 );
                        }
                        $AgeCond = $dateNaissance->diffInYears( $dateActuelle );
                        $condamner->ecrou_prevenus = $numero_ecrou_prevenus;
                        $condamner->numero = $numero;
                        $condamner->type = $type;
                        $condamner->nom = $nom;
                        $condamner->prenom = $prenom;
                        $condamner->naissance = $datenaissance;
                        $condamner->lieu = $domicile;
                        $condamner->cartier = $cartier;
                        $condamner->region = $region;
                        $condamner->commune = $commune;
                        $condamner->district = $district;
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
                        $condamner->region1 = $region1;
                        $condamner->commune1 = $commune1;
                        $condamner->district1 = $district1;
                        $condamner->contacte = $contact;
                        $condamner->categorie = $categorie;
                        $condamner->status = trim($status);
                        $condamner->date_status = $date_status;
                        $condamner->situation = trim($situation);
                        $condamner->date_situation = $date_situation;
                        $condamner->sexe = $sexe;
        
                        if ( $AgeCond < 18 ) {
        
                            $condamner->age = 'mineur';
                        } else {
                            $condamner->age = 'majeur';
                        } 
        
                        $condamner->ageDate = $AgeCond;
                        $condamner->date_ecrou = $date_ecrou;
                        $condamner->photo = basename( $monPhoto );
                        $condamner->inculpation = $stringInculpation;
                        $condamner->classification = $classification;
                        $condamner->observation = $observation;
                        $condamner->mandataire = $mandataire;
                        $condamner->peine = $stringPeine;
                        $condamner->unite_peine = $unite_peine;
                        $condamner->date_fin_peine = $date_fin_peine;
                        $condamner->remise_peine = null;
                        $condamner->unite_remise_peine = null;
                        $condamner->date_fin_remise_peine = null;
                        $condamner->save();
        
                        condamner_historie::create( [
                            'condamner_id' => $condamner->id,
                            'status' => trim($status),
                            'date_status' => $date_status,
                            'situation' => trim($situation),
                            'date_situation' => $date_situation,
                            'observation' => null,
                            'date_observation' => null,
                        ] );
                        unlink( $cheminImg );
        
                        $prevenus->delete();
                        return redirect( '/index/tableCondamner' );
                        // break;
                    } else {
                        session()->flash( 'message', 'operation ajout à été interropus' );
                        return redirect()->back();
                    }
                   
                }    
        } else {
            
            echo "aucune prevenus trouver";
        }
        return Command::SUCCESS;
    }
    
    }
}
