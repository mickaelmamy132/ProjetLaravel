<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;
use App\Models\liberer;
use App\Models\condamner;
use App\Models\condamner_historie;
use Carbon\Carbon;
use App\Console\Kernel;
 
class TransferLibere extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transferlibere';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transférer les détenus libérés de la table condamner à la table libere';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    { 
        // $subQuery->whereDay('date_fin_remise_peine', $dateActuelle->day)
        //             ->whereMonth('date_fin_remise_peine',$dateActuelle->month)
        //             ->whereYear('date_fin_remise_peine',$dateActuelle->year);
        $dateActuelle = Carbon::now();
        $condamnesLibere = condamner::where(function ($query) use ($dateActuelle) {
            $query->where(function ($subQuery) use ($dateActuelle) {
                $subQuery->whereDay('date_fin_remise_peine','<=', $dateActuelle->day)
                    ->whereMonth('date_fin_remise_peine','<=',$dateActuelle->month)
                    ->whereYear('date_fin_remise_peine','<=', $dateActuelle->year);
            })->orWhere(function ($subQuery) use ($dateActuelle) {
                $subQuery->whereDay('date_fin_peine','<=', $dateActuelle->day)
                    ->whereMonth('date_fin_peine','<=', $dateActuelle->month)
                    ->whereYear('date_fin_peine','<=', $dateActuelle->year);
            });
        })->get();



        foreach ($condamnesLibere as $condamnesLiberes) {
            // Créez une nouvelle entrée dans la table libere

            $cheminImg = public_path('/imgCondamner/'.$condamnesLiberes->photo);
                File::makeDirectory(public_path('temp'), $mode = 0755, true, true);
                // dd($cheminImg);
                if (file_exists($cheminImg)) {
                    $monPhoto = public_path('temp/' . time() . '.' . pathinfo($condamnesLiberes->photo, PATHINFO_EXTENSION));
                    copy($cheminImg, $monPhoto);
                    echo "photo valide";
                } else {
                    echo "photo manquante ou non valide";
                }
          
            $liberer = new liberer();
            if($liberer){
                $datenaissance = $condamnesLiberes->naissance;
    
                if ($datenaissance) {
                    if (strpos($datenaissance, '-') !== false) {
                        $dateNaissance = Carbon::createFromFormat('Y-m-d H:i:s', $datenaissance);
                    } else {
                        $dateNaissance = Carbon::create( $datenaissance, 1, 1 );
                    }
                } else {
                    $dateNaissance = Carbon::create( $condamnesLiberes->naissance, 1, 1 );
                }
                $AgeCond = $dateNaissance->diffInYears( $dateActuelle );

                $liberer->ecrou_prevenus = $condamnesLiberes->id;
                $liberer->numero = $condamnesLiberes->numero;
                $liberer->type = $condamnesLiberes->type;
                $liberer->nom = $condamnesLiberes->nom;
                $liberer->prenom = $condamnesLiberes->prenom;
                $liberer->naissance = $condamnesLiberes->naissance;
                $liberer->lieu = $condamnesLiberes->lieu;
                $liberer->cartier = $condamnesLiberes->cartier;
                $liberer->region = $condamnesLiberes->region;
                $liberer->commune = $condamnesLiberes->commune;
                $liberer->district = $condamnesLiberes->district;
                $liberer->nationalité = $condamnesLiberes->nationalité;
                $liberer->cin = $condamnesLiberes->cin;
                $liberer->date_delivrance = $condamnesLiberes->date_delivrance;
                $liberer->profession = $condamnesLiberes->profession;
                $liberer->pere = $condamnesLiberes->pere;
                $liberer->mere = $condamnesLiberes->mere;
                $liberer->marié = $condamnesLiberes->marié;
                $liberer->enfant = $condamnesLiberes->enfant;
                $liberer->adresse = $condamnesLiberes->adresse;
                $liberer->cartier1 = $condamnesLiberes->cartier1;
                $liberer->region1 = $condamnesLiberes->region1;
                $liberer->commune1 = $condamnesLiberes->commune1;
                $liberer->district1 = $condamnesLiberes->district1;
                $liberer->contacte = $condamnesLiberes->contacte;
                $liberer->categorie = $condamnesLiberes->categorie;
                $liberer->status = "Libérè"; 
                $liberer->sexe = $condamnesLiberes->sexe;
        
        
                if ($AgeCond < 18) {
                    
                    $liberer->age = "mineur";
                } 
                else {
                    $liberer->age = "majeur";
                }
                
                $liberer->ageDate = $AgeCond;
                $liberer->date_liberation = $dateActuelle;
                $liberer->date_ecrou = $condamnesLiberes->date_ecrou;
                $liberer->date_condamnation = $condamnesLiberes->date_status;
                $liberer->photo = basename($monPhoto);
                $liberer->inculpation = $condamnesLiberes->inculpation;
                $liberer->mandataire = $condamnesLiberes->mandataire;
                $liberer->save();
                condamner_historie::create([
                    'condamner_id' => $condamnesLiberes->id,
                    'status' => "Libérè",
                    'date_status' => $dateActuelle,
                    'situation' => null,
                    'date_situation' => null,
                ]);
                unlink($cheminImg);
                $condamnesLiberes->delete();
                return redirect('/index/tableLiberer');  
            }

        $this->info('Transfert des données effectué avec succès.');
        return Command::SUCCESS;
     }
   }
}