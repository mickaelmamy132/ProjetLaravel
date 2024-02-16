<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\condamner;
use App\Models\prevenus;
use App\Models\liberer;
use App\Models\condamner_historie;
use App\Models\prevenus_historie;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use TCPDF;

class PdfController extends Controller
{
 
    public function Imp(Request $request)
    {
        Carbon::setLocale('fr');
        $maison = $request->input('maison');
        $dateActuelle = $request->input('date');
        $formatDate = Carbon::createFromFormat('Y-m-d',$dateActuelle);
        $date_f = $formatDate->translatedFormat('j F Y');
        $anneeCourante = $formatDate->year;


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

        // tableau effectif totaole
        $janvier4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $MoisJanvier)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $MoisJanvier)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $fevrier4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moisfevrier)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moisfevrier)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $mars4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moismars)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moismars)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $avril4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moisavril)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moisavril)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $mai4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moismais)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moismais)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $juin4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moisjuin)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moisjuin)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $juillet4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moisjuillet)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moisjuillet)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $Aout4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moisaout)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moisaout)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $septembre4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moisseptembre)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moisseptembre)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $octobre4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moisoctobre)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moisoctobre)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $novembre4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moisnovembre)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moisnovembre)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();

        $decembre4 = DB::table('condamners')
        ->select(DB::raw("'condamners' as type"))
        ->whereMonth('date_ecrou', '=', $Moisdecembre)
        ->whereYear('date_ecrou', '=', $anneeCourante)
    
        ->unionAll(DB::table('prevenuses')
            ->select(DB::raw("'prevenuses' as type"))
            ->whereMonth('date_ecrou', '=', $Moisdecembre)
            ->whereYear('date_ecrou', '=', $anneeCourante)
        )
        ->count();


        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'landscape');

        $html = '<html><head><style>
.container {
            margin-top: -10;
        }
        .table-container {
            width: 48%;
        }
   
        table {         
            // margin-end: 10px;
            border-collapse: collapse; 
            // margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
        } 
        th, td { 
            border: 1px solid black; 
            padding: 7px;  /* Réduire la taille du padding à 5px */
            text-align: center; 
            font-size: 15px;  /* Réduire la taille de la police à 12px */
        } 
        h3{
            margin-bottom: -10px;
            text-decoration: underline;
        }

       </style></head><body style="text-align: left; font-size: 7px;margin: 50px;">';
        $html .= '<h3 style = "text-align: center;font-size: 15px;margin-top: -40px;">Maison centrale de: '.$maison.' fiche de synthese</h3>';
        $html .= '<p style = "text-align: right;font-size: 15px;margin-top: -40px;">date: '.$date_f.'</p>';
        $html .= '<div class="container">';
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th colspan="12">Evasion</th>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>janvier</th>';
        $html .= '<th>fevrier</th>';
        $html .= '<th>mars</th>';
        $html .= '<th>avril</th>';
        $html .= '<th>mai</th>';
        $html .= '<th>juin</th>';
        $html .= '<th>juilet</th>';
        $html .= '<th>Août</th>';
        $html .= '<th>septembre</th>';
        $html .= '<th>octobre</th>';
        $html .= '<th>novembre</th>';
        $html .= '<th>décembre</th>';
        $html .= '</tr>';
	    $html .= '</thead>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>'.$janvier.'</td>';
        $html .= '<td>'.$fevrier.'</td>';
        $html .= '<td>'.$mars.'</td>';
        $html .= '<td>'.$avril.'</td>';
        $html .= '<td>'.$mai.'</td>';
        $html .= '<td>'.$juin.'</td>';
        $html .= '<td>'.$juillet.'</td>';
        $html .= '<td>'.$Aout.'</td>';
        $html .= '<td>'.$septembre.'</td>';
        $html .= '<td>'.$octobre.'</td>';
        $html .= '<td>'.$novembre.'</td>';
        $html .= '<td>'.$decembre.'</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';


        //Déces tableaux
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th colspan="12">Déces</th>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>janvier</th>';
        $html .= '<th>fevrier</th>';
        $html .= '<th>mars</th>';
        $html .= '<th>avril</th>';
        $html .= '<th>mai</th>';
        $html .= '<th>juin</th>';
        $html .= '<th>juilet</th>';
        $html .= '<th>Août</th>';
        $html .= '<th>septembre</th>';
        $html .= '<th>octobre</th>';
        $html .= '<th>novembre</th>';
        $html .= '<th>décembre</th>';
        $html .= '</tr>';
	    $html .= '</thead>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>'.$janvier3.'</td>';
        $html .= '<td>'.$fevrier3.'</td>';
        $html .= '<td>'.$mars3.'</td>';
        $html .= '<td>'.$avril3.'</td>';
        $html .= '<td>'.$mai3.'</td>';
        $html .= '<td>'.$juin3.'</td>';
        $html .= '<td>'.$juillet3.'</td>';
        $html .= '<td>'.$Aout3.'</td>';
        $html .= '<td>'.$septembre3.'</td>';
        $html .= '<td>'.$octobre3.'</td>';
        $html .= '<td>'.$novembre3.'</td>';
        $html .= '<td>'.$decembre3.'</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';

        // hospitalisation tableau
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th colspan="12">hospitalisation</th>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>janvier</th>';
        $html .= '<th>fevrier</th>';
        $html .= '<th>mars</th>';
        $html .= '<th>avril</th>';
        $html .= '<th>mai</th>';
        $html .= '<th>juin</th>';
        $html .= '<th>juilet</th>';
        $html .= '<th>Août</th>';
        $html .= '<th>septembre</th>';
        $html .= '<th>octobre</th>';
        $html .= '<th>novembre</th>';
        $html .= '<th>décembre</th>';
        $html .= '</tr>';
	    $html .= '</thead>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>'.$janvier2.'</td>';
        $html .= '<td>'.$fevrier2.'</td>';
        $html .= '<td>'.$mars2.'</td>';
        $html .= '<td>'.$avril2.'</td>';
        $html .= '<td>'.$mai2.'</td>';
        $html .= '<td>'.$juin2.'</td>';
        $html .= '<td>'.$juillet2.'</td>';
        $html .= '<td>'.$Aout2.'</td>';
        $html .= '<td>'.$septembre2.'</td>';
        $html .= '<td>'.$octobre2.'</td>';
        $html .= '<td>'.$novembre2.'</td>';
        $html .= '<td>'.$decembre2.'</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';

        // effetecif totale
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th colspan="12">Effectif général</th>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<th>janvier</th>';
        $html .= '<th>fevrier</th>';
        $html .= '<th>mars</th>';
        $html .= '<th>avril</th>';
        $html .= '<th>mai</th>';
        $html .= '<th>juin</th>';
        $html .= '<th>juilet</th>';
        $html .= '<th>Août</th>';
        $html .= '<th>septembre</th>';
        $html .= '<th>octobre</th>';
        $html .= '<th>novembre</th>';
        $html .= '<th>décembre</th>';
        $html .= '</tr>';
	    $html .= '</thead>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>'.$janvier4.'</td>';
        $html .= '<td>'.$fevrier4 + $janvier4.'</td>';
        $html .= '<td>'.$mars4 + $fevrier4 + $janvier4.'</td>';
        $html .= '<td>'.$avril4 + $mars4 + $fevrier4 + $janvier4.'</td>';
        $html .= '<td>'.$mai4 + $avril4 + $mars4 + $fevrier4 + $janvier4.'</td>';
        $html .= '<td>'.$juin4 + $mai4 + $avril4 + $mars4 + $fevrier4 + $janvier4.'</td>';
        $html .= '<td>'.$juillet4 + $juin4 + $mai4 + $avril4 + $mars4 + $fevrier4 + $janvier4.'</td>';
        $html .= '<td>'.$Aout4 + $juillet4 + $juin4 + $mai4 + $avril4 + $mars4 + $fevrier4 + $janvier4.'</td>';
        $html .= '<td>'.$septembre4 + $Aout4 + $juillet4 + $juin4 + $mai4 + $avril4 + $mars4 + $fevrier4 + $janvier4.'</td>';
        $html .= '<td>'.$octobre4 + $septembre4 + $Aout4 + $juillet4 + $juin4 + $mai4 + $avril4 + $mars4 + $fevrier4 + $janvier4.'</td>';
        $html .= '<td>'.$novembre4 + $octobre4 + $septembre4 + $Aout4 + $juillet4 + $juin4 + $mai4 + $avril4 + $mars4 + $fevrier4 + $janvier4.'</td>';
        $html .= '<td>'.$decembre4 + $novembre4 + $octobre4 + $septembre4 + $Aout4 + $juillet4 + $juin4 + $mai4 + $avril4 + $mars4 + $fevrier4 + $janvier4.'</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';

        $html .= '</div>';
        $html .= '</body></html>';
        $dompdf->loadHtml($html);
        $dompdf->render();


        $dompdf->stream('sinthese.pdf', [
            'Attachment' => true,
        ]);
    }
    




    
public function ImpreStater(Request $request)
{
    $dateLimite = null;

    $dateActu = $request->input('date');    $prevenu = Prevenus::all(); 
echo " $dateActu";
//     foreach ($prevenu as $prevenuss) {

//         $type = $prevenuss->type;
//         $typeArray = explode('/', $type);
        
//         $lowercaseType = strtolower($typeArray[0]);
        
//         if (in_array($lowercaseType, ['rp', 'co', 'cr'])) {
//             switch ($lowercaseType) {
//                 case 'rp':
//                     // $var = 10;
//                     $dateLimite = Carbon::now()->subWeekdays(9)->toDateString();
//                     break;
//                 case 'co':
//                     // $var = 5;
//                     $dateLimite = Carbon::now()->subWeekdays(4)->toDateString();
//                     break;
//                 case 'cr':
//                     // $var = 3;
//                     $dateLimite = Carbon::now()->subDays(2)->toDateString();
//                     break; 
//             }
//         }
//         if ($dateLimite !== null) {
//             $prevenuses = Prevenus::whereDate('date_status', '<', $dateLimite)
//                 ->where(function ($query) {
//                     $query->where('status', 'Emprisonnement')
//                         ->orWhere('status', 'Detention préventive')
//                         ->orWhere('status', 'Travaux Force')
//                         ->orWhere('status', 'Travaux Force à perpétuité')
//                         ->orWhere('status', 'peine de mort');
//                 })
//                 ->whereNull('etat')
//                 ->get();

//                 return [$prevenuses];
//             }
// }
}








    // pdf entrant et sortie
    public function ImpreStat(Request $request){

        Carbon::setLocale('fr');
        $greffier = $request->input('greffier');
        $maison = $request->input('maison');
        $dateActu = $request->input('date');
        $dateActuelle = Carbon::createFromFormat('Y-m-d',$dateActu);
        $moisPrecedent = $dateActuelle;
        $dateFinale2 = $dateActuelle->translatedFormat('j F Y');
        $dateFinale1 = $dateActuelle->subMonths()->Format('F Y');
        $dateFinale = $dateFinale1;

        // population en debut periode
        $population_debut_1lign_1colon = prevenus::whereMonth('date_ecrou', '<', $moisPrecedent->month)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $population_debut_1lign_2colon = prevenus::whereMonth('date_ecrou', '<', $moisPrecedent->month)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $population_debut_1lign_3colon = prevenus::whereMonth('date_ecrou', '<', $moisPrecedent->month)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Femme')
        ->count();
        
        $population_debut_1lign_4colon = prevenus::whereMonth('date_ecrou', '<', $moisPrecedent->month)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $population_debut_1lign_5colon = condamner::whereMonth('date_ecrou', '<', $moisPrecedent->month)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $population_debut_1lign_6colon = condamner::whereMonth('date_ecrou', '<', $moisPrecedent->month)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $population_debut_1lign_7colon = condamner::whereMonth('date_ecrou', '<', $moisPrecedent->month)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $population_debut_1lign_8colon = condamner::whereMonth('date_ecrou', '<', $moisPrecedent->month)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Femme')
        ->count();

        // fin

        // entrant sur le periode
        $entrant_2lign_1colon = prevenus::whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $dateActuelle->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $entrant_2lign_2colon = prevenus::whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $dateActuelle->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $entrant_2lign_3colon = prevenus::whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $dateActuelle->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $entrant_2lign_4colon = prevenus::whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $dateActuelle->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $entrant_2lign_5colon = condamner::whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $dateActuelle->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $entrant_2lign_6colon = condamner::whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $dateActuelle->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $entrant_2lign_7colon = condamner::whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $dateActuelle->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $entrant_2lign_8colon = condamner::whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $dateActuelle->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Femme')
        ->count();
        // fin

        // dont passage
        $dont_3lign_1colon = prevenus::where(function($query) use ($moisPrecedent) {
            $query->Where('situation', '=', 'passagers(e)');
        })
        ->whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $moisPrecedent->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $dont_3lign_2colon = prevenus::where(function($query) use ($moisPrecedent) {
            $query->Where('situation', '=', 'passagers(e)');
        })
        ->whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $moisPrecedent->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $dont_3lign_3colon = prevenus::where(function($query) use ($moisPrecedent) {
        $query->Where('situation', '=', 'passagers(e)');
        })
        ->whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $moisPrecedent->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $dont_3lign_4colon = prevenus::where(function($query) use ($moisPrecedent) {
        $query->Where('situation', '=', 'passagers(e)');
        })
        ->whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $moisPrecedent->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $dont_3lign_5colon = condamner::where(function($query) use ($moisPrecedent) {
        $query->Where('situation', '=', 'passagers(e)');
        })
        ->whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $moisPrecedent->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $dont_3lign_6colon = condamner::where(function($query) use ($moisPrecedent) {
        $query->Where('situation', '=', 'passagers(e)');
        })
        ->whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $moisPrecedent->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $dont_3lign_7colon = condamner::where(function($query) use ($moisPrecedent) {
        $query->Where('situation', '=', 'passagers(e)');
        })
        ->whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $moisPrecedent->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $dont_3lign_8colon = condamner::where(function($query) use ($moisPrecedent) {
        $query->Where('situation', '=', 'passagers(e)');
        })
        ->whereMonth('date_ecrou', $moisPrecedent->month)
        ->whereYear('date_ecrou', $moisPrecedent->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Femme')
        ->count();
        // fin
        
        // sortant sur la period
        $sortant_4lign_1colon = liberer::where(function($query) use ($moisPrecedent) {
            $query->where('categorie', '=', 'Prevenus')
                  ->orWhere('categorie', '=', 'Accuses')
                  ->orWhere('categorie', '=', 'Inculpes');
        })
        ->whereMonth('date_liberation', $moisPrecedent->month)
        ->whereYear('date_liberation', $moisPrecedent->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Homme')
        ->count();
    
        $sortant_4lign_2colon = liberer::where(function($query) use ($moisPrecedent) {
            $query->where('categorie', '=', 'Prevenus')
                  ->orWhere('categorie', '=', 'Accuses')
                  ->orWhere('categorie', '=', 'Inculpes');
        })
        ->whereMonth('date_liberation', $moisPrecedent->month)
        ->whereYear('date_liberation', $moisPrecedent->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $sortant_4lign_3colon = liberer::where(function($query) use ($moisPrecedent) {
            $query->where('categorie', '=', 'Prevenus')
                  ->orWhere('categorie', '=', 'Accuses')
                  ->orWhere('categorie', '=', 'Inculpes');
        })
        ->whereMonth('date_liberation', $moisPrecedent->month)
        ->whereYear('date_liberation', $moisPrecedent->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $sortant_4lign_4colon = liberer::where(function($query) use ($moisPrecedent) {
            $query->where('categorie', '=', 'Prevenus')
                  ->orWhere('categorie', '=', 'Accuses')
                  ->orWhere('categorie', '=', 'Inculpes');
        })
        ->whereMonth('date_liberation', $moisPrecedent->month)
        ->whereYear('date_liberation', $moisPrecedent->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $sortant_4lign_5colon = liberer::where('categorie','=','condamner')
        ->whereMonth('date_liberation', $moisPrecedent->month)
        ->whereYear('date_liberation', $moisPrecedent->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $sortant_4lign_6colon = liberer::where('categorie','=','condamner')
        ->whereMonth('date_liberation', $moisPrecedent->month)
        ->whereYear('date_liberation', $moisPrecedent->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Homme')
        ->count();

        $sortant_4lign_7colon = liberer::where('categorie','=','condamner')
        ->whereMonth('date_liberation', $moisPrecedent->month)
        ->whereYear('date_liberation', $moisPrecedent->year)
        ->where('age', '=', 'majeur')
        ->where('sexe', '=', 'Femme')
        ->count();

        $sortant_4lign_8colon = liberer::where('categorie','=','condamner')
        ->whereMonth('date_liberation', $moisPrecedent->month)
        ->whereYear('date_liberation', $moisPrecedent->year)
        ->where('age', '=', 'mineur')
        ->where('sexe', '=', 'Femme')
        ->count();
        // fin
        $population_fin_period_1colon = $population_debut_1lign_1colon + $entrant_2lign_1colon + $dont_3lign_1colon + $sortant_4lign_1colon - $sortant_4lign_1colon;
        $population_fin_period_2colon = $population_debut_1lign_2colon + $entrant_2lign_2colon + $dont_3lign_2colon + $sortant_4lign_2colon - $sortant_4lign_2colon;
        $population_fin_period_3colon = $population_debut_1lign_3colon + $entrant_2lign_3colon + $dont_3lign_3colon + $sortant_4lign_3colon - $sortant_4lign_3colon;
        $population_fin_period_4colon = $population_debut_1lign_4colon + $entrant_2lign_4colon + $dont_3lign_4colon + $sortant_4lign_4colon - $sortant_4lign_4colon;
        $population_fin_period_5colon = $population_debut_1lign_5colon + $entrant_2lign_5colon + $dont_3lign_5colon + $sortant_4lign_5colon - $sortant_4lign_5colon;
        $population_fin_period_6colon = $population_debut_1lign_6colon + $entrant_2lign_6colon + $dont_3lign_6colon + $sortant_4lign_6colon - $sortant_4lign_6colon;
        $population_fin_period_7colon = $population_debut_1lign_7colon + $entrant_2lign_7colon + $dont_3lign_7colon + $sortant_4lign_7colon - $sortant_4lign_7colon;
        $population_fin_period_8colon = $population_debut_1lign_8colon + $entrant_2lign_8colon + $dont_3lign_8colon + $sortant_4lign_8colon - $sortant_4lign_8colon;
        $totale_population = $population_fin_period_1colon + $population_fin_period_2colon + $population_fin_period_3colon + $population_fin_period_4colon + $population_fin_period_5colon + $population_fin_period_6colon + $population_fin_period_7colon + $population_fin_period_8colon;

        $total_1lign =  $population_debut_1lign_1colon +
                        $population_debut_1lign_2colon +
                        $population_debut_1lign_3colon +
                        $population_debut_1lign_4colon +
                        $population_debut_1lign_5colon +
                        $population_debut_1lign_6colon +
                        $population_debut_1lign_7colon +
                        $population_debut_1lign_8colon + 
                        $sortant_4lign_1colon + $sortant_4lign_2colon + $sortant_4lign_3colon + $sortant_4lign_4colon + $sortant_4lign_5colon + $sortant_4lign_6colon + $sortant_4lign_7colon + $sortant_4lign_8colon;
                        

        $total_2lign =  $entrant_2lign_1colon +
                        $entrant_2lign_2colon +
                        $entrant_2lign_3colon +
                        $entrant_2lign_4colon +
                        $entrant_2lign_5colon +
                        $entrant_2lign_6colon +
                        $entrant_2lign_7colon +
                        $entrant_2lign_8colon ;   
                        
        $total_3lign =  $dont_3lign_1colon +
                        $dont_3lign_2colon +
                        $dont_3lign_3colon +
                        $dont_3lign_4colon +
                        $dont_3lign_5colon +
                        $dont_3lign_6colon +
                        $dont_3lign_7colon +
                        $dont_3lign_8colon;

        $total_4lign =  $sortant_4lign_1colon +
                        $sortant_4lign_2colon +
                        $sortant_4lign_3colon +
                        $sortant_4lign_4colon +
                        $sortant_4lign_5colon +
                        $sortant_4lign_6colon +
                        $sortant_4lign_7colon +
                        $sortant_4lign_8colon;
        $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
    
            $dompdf = new Dompdf($options);
            $dompdf->setPaper('A4', 'landscape');
    
            $html = '<html><head>
            <style>
                @page {
                    margin-top: 70px; 
                }
                .landscape-table {
                    width: 100%;
                    margin-top: 20px; 
                }
                table {
                    border-collapse: collapse;
                    width: 100%;
                    height: 150px;
                    margin-top: 10px; 
                }
                th, td {
                    border: 1px solid black;
                    padding: 8px; 
                    text-align: center;
                    font-size: 18px; 
                }
                ddf{
                    float: right;
                }
            </style>
            <style type="text/css" media="print">
             @page {
                 size: landscape;
             }
           </style>
           </head><body>';
            $html .= '<div class="landscape-table">';
            $html .= '<h3 style="text-align: center;"> ETAT DE LA POPULATION CARCERALE      model : 17</h3>';
            $html .= '<p style="text-align: center;margin-top:-10;">**********************           NS : PRISON';
            $html .= '<p style="text-align: center;">Période du mois de '.$dateFinale.'</p>';
            $html .= '<p style="text-align: center;margin-top:-10;">***********</p>';
            $html .= '<table>';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th rowspan="3">Status</th>';
            $html .= '<th colspan="4">Prévenus</th>';
            $html .= '<th colspan="4">Condamnés</th>';
            $html .= '<th rowspan="3">Total</th>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<th colspan="2">Hommes</th>';
            $html .= '<th colspan="2">Femmes</th>';
            $html .= '<th colspan="2">Hommes</th>';
            $html .= '<th colspan="2">Femmes</th>';
            $html .= '</tr>';
            $html .='<tr>';
            $html .='<th>Majeurs</th>';
            $html .='<th>Mineurs</th>';
            $html .='<th>Majeurs</th>';
            $html .='<th>Mineurs</th>';
            $html .='<th>Majeurs</th>';
            $html .='<th>Mineurs</th>';
            $html .='<th>Majeurs</th>';
            $html .='<th>Mineurs</th>';
            $html .='</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td>Population en début de Période</td>';
            $html .= '<td>'.$population_debut_1lign_1colon + $sortant_4lign_1colon.'</td>';
            $html .= '<td>'.$population_debut_1lign_2colon + $sortant_4lign_2colon.'</td>';
            $html .= '<td>'.$population_debut_1lign_3colon + $sortant_4lign_3colon.'</td>';
            $html .= '<td>'.$population_debut_1lign_4colon + $sortant_4lign_4colon.'</td>';
            $html .= '<td>'.$population_debut_1lign_5colon + $sortant_4lign_5colon.'</td>';
            $html .= '<td>'.$population_debut_1lign_6colon + $sortant_4lign_6colon.'</td>';
            $html .= '<td>'.$population_debut_1lign_7colon + $sortant_4lign_7colon.'</td>';
            $html .= '<td>'.$population_debut_1lign_8colon + $sortant_4lign_8colon.'</td>';
            $html .= '<td>'.$total_1lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>entrant sur la Période</td>';
            $html .= '<td>'.$entrant_2lign_1colon.'</td>';
            $html .= '<td>'.$entrant_2lign_2colon.'</td>';
            $html .= '<td>'.$entrant_2lign_3colon.'</td>';
            $html .= '<td>'.$entrant_2lign_4colon.'</td>';
            $html .= '<td>'.$entrant_2lign_5colon.'</td>';
            $html .= '<td>'.$entrant_2lign_6colon.'</td>';
            $html .= '<td>'.$entrant_2lign_7colon.'</td>';
            $html .= '<td>'.$entrant_2lign_8colon.'</td>';
            $html .= '<td>'.$total_2lign.'</td>';
            $html .= '</tr>';
            $html .= '<td>Dont passagers</td>';
            $html .= '<td>'.$dont_3lign_1colon.'</td>';
            $html .= '<td>'.$dont_3lign_2colon.'</td>';
            $html .= '<td>'.$dont_3lign_3colon.'</td>';
            $html .= '<td>'.$dont_3lign_4colon.'</td>';
            $html .= '<td>'.$dont_3lign_5colon.'</td>';
            $html .= '<td>'.$dont_3lign_6colon.'</td>';
            $html .= '<td>'.$dont_3lign_7colon.'</td>';
            $html .= '<td>'.$dont_3lign_8colon.'</td>';
            $html .= '<td>'.$total_3lign.'</td>';
            $html .= '</tr>';
            $html .='<tr>';
            $html .= '<td>Sortant sur la Période</td>';
            $html .= '<td>'.$sortant_4lign_1colon.'</td>';
            $html .= '<td>'.$sortant_4lign_2colon.'</td>';
            $html .= '<td>'.$sortant_4lign_3colon.'</td>';
            $html .= '<td>'.$sortant_4lign_4colon.'</td>';
            $html .= '<td>'.$sortant_4lign_5colon.'</td>';
            $html .= '<td>'.$sortant_4lign_6colon.'</td>';
            $html .= '<td>'.$sortant_4lign_7colon.'</td>';
            $html .= '<td>'.$sortant_4lign_8colon.'</td>';
            $html .= '<td>'.$total_4lign.'</td>';
            $html .= '</tr>';
            $html .='<tr>';
            $html .= '<td>Population en fin de Période</td>';
            $html .= '<td>'.$population_fin_period_1colon.'</td>';
            $html .= '<td>'.$population_fin_period_2colon.'</td>';
            $html .= '<td>'.$population_fin_period_3colon.'</td>';
            $html .= '<td>'.$population_fin_period_4colon.'</td>';
            $html .= '<td>'.$population_fin_period_5colon.'</td>';
            $html .= '<td>'.$population_fin_period_6colon.'</td>';
            $html .= '<td>'.$population_fin_period_7colon.'</td>';
            $html .= '<td>'.$population_fin_period_8colon.'</td>';
            $html .= '<td>'.$totale_population.'</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';

            $html .= '<div class="ddf" style="float: right;">';
            $html .= '<p style="">'.$maison.' , le '.$dateFinale2.'</p>';
            $html .= '<p style="margin-bottom: 45px;">LE GREFFIER-COMPTABLE</p>';
            // $html .= '<p>'.$greffier.'</p>';
            $html .= '</div>';

            $html .= '<div class="ddf" style="float: right;margin-top: 150px;margin-right: -200px;">';
            $html .= '<p>'.$greffier.'</p>';
            $html .= '</div>';

            $html .= '<div style="float: left;">';
            $html .= '<p>vu:</p>';
            $html .= '<p>LE CHEF D\' ETABLISSEMNET </p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</body></html>';
             $dompdf->loadHtml($html);
            $dompdf->render();

            $dompdf->stream('model_17.pdf', [
                'Attachment' => true,
            ]);
    

    }


    // models 16
    public function Impre(Request $request){
        $condamer = condamner::all();
        $prevenus = prevenus::all();
        // Date actuelle
        $dateActuelle = Carbon::now();

        // Date il y a 2 mois
        $dateIlYa1Mois = $dateActuelle->copy()->subMonths(1);
        $dateIlYa12Mois = $dateActuelle->copy()->subMonths(12);
        $dateIlYa24Mois = $dateActuelle->copy()->subMonths(24);
        $dateIlYa36Mois = $dateActuelle->copy()->subMonths(36);
        $dateIlYa60Mois = $dateActuelle->copy()->subMonths(60);
        $dateIlYa120Mois = $dateActuelle->copy()->subMonths(120);
        $dateIlYa180Mois = $dateActuelle->copy()->subMonths(180);
        $maison = $request->input('maison');
        $date = $request->input('date');
        Carbon::setLocale('fr');
        $dateComplet = Carbon::createFromFormat('Y-m-d',$date);
        $datefinale = $dateComplet->translatedFormat('l j F Y');
        if($condamer && $prevenus){
            //calcule du tableau Situation numerique G
            $Moin_18_garçcon_C = condamner::where('ageDate', '<', 18)->where('sexe', '=', 'Homme')->count();
            $Moin_18_fille_C = condamner::where('ageDate', '<', 18)->where('sexe', '=', 'Femme')->count();
            $Moin_18_garçcon_P = prevenus::where('ageDate', '<', 18)->where('sexe', '=', 'Homme')->count();
            $Moin_18_fille_P = prevenus::where('ageDate', '<', 18)->where('sexe', '=', 'Femme')->count();

            $deuxime_lign_homme_c = condamner::whereBetween('ageDate',[18, 21])->where('sexe', '=', 'Homme')->count();
            $deuxime_lign_femme_c = condamner::whereBetween('ageDate',[18, 21])->where('sexe', '=', 'Femme')->count();
            $deuxime_lign_homme_P = prevenus::whereBetween('ageDate',[18, 21])->where('sexe', '=', 'Homme')->count();
            $deuxime_lign_femme_P = prevenus::whereBetween('ageDate',[18, 21])->where('sexe', '=', 'Femme')->count();

            $troisieme_lign_homme_c = condamner::whereBetween('ageDate',[22, 35])->where('sexe', '=', 'Homme')->count();
            $troisieme_lign_femme_c = condamner::whereBetween('ageDate',[22, 35])->where('sexe', '=', 'Femme')->count();
            $troisieme_lign_homme_P = prevenus::whereBetween('ageDate',[22, 35])->where('sexe', '=', 'Homme')->count();
            $troisieme_lign_femme_P = prevenus::whereBetween('ageDate',[22, 35])->where('sexe', '=', 'Femme')->count();

            $quatrieme_lign_homme_c = condamner::whereBetween('ageDate',[36, 49])->where('sexe', '=', 'Homme')->count();
            $quatrieme_lign_femme_c = condamner::whereBetween('ageDate',[36, 49])->where('sexe', '=', 'Femme')->count();
            $quatrieme_lign_homme_P = prevenus::whereBetween('ageDate',[36, 49])->where('sexe', '=', 'Homme')->count();
            $quatrieme_lign_femme_P = prevenus::whereBetween('ageDate',[36, 49])->where('sexe', '=', 'Femme')->count();

            $cinquieme_lign_homme_c = condamner::whereBetween('ageDate',[50,59])->where('sexe', '=', 'Homme')->count();
            $cinquieme_lign_femme_c = condamner::whereBetween('ageDate',[50,59])->where('sexe', '=', 'Femme')->count();
            $cinquieme_lign_homme_P = prevenus::whereBetween('ageDate',[50,59])->where('sexe', '=', 'Homme')->count();
            $cinquieme_lign_femme_P = prevenus::whereBetween('ageDate',[50,59])->where('sexe', '=', 'Femme')->count();

            $sixieme_lign_homme_c = condamner::where('ageDate','>',60)->where('sexe', '=', 'Homme')->count();
            $sixieme_lign_femme_c = condamner::where('ageDate','>',60)->where('sexe', '=', 'Femme')->count();
            $sixieme_lign_homme_P = prevenus::where('ageDate','>',60)->where('sexe', '=', 'Homme')->count();
            $sixieme_lign_femme_P = prevenus::where('ageDate','>',60)->where('sexe', '=', 'Femme')->count();

            $totale_1colonn_c = $deuxime_lign_homme_c + $troisieme_lign_homme_c + $quatrieme_lign_homme_c + $cinquieme_lign_homme_c + $sixieme_lign_homme_c;
            $totale_2colonn_c = $deuxime_lign_femme_c + $troisieme_lign_femme_c + $quatrieme_lign_femme_c + $cinquieme_lign_femme_c + $sixieme_lign_femme_c;
            $totale_3colonn_c = $Moin_18_garçcon_C;
            $totale_4colonn_c = $Moin_18_fille_C;

            $totale_1colonn_p = $deuxime_lign_homme_P + $troisieme_lign_homme_P + $quatrieme_lign_homme_P + $cinquieme_lign_homme_P + $sixieme_lign_homme_P;
            $totale_2colonn_p = $deuxime_lign_femme_P + $troisieme_lign_femme_P + $quatrieme_lign_femme_P + $cinquieme_lign_femme_P + $sixieme_lign_femme_P;
            $totale_3colonn_p = $Moin_18_garçcon_P;
            $totale_4colonn_p = $Moin_18_fille_P;

            $totale_dernier_1lign = $Moin_18_garçcon_C + $Moin_18_fille_C + $Moin_18_garçcon_P + $Moin_18_fille_P;
            $totale_dernier_2lign = $deuxime_lign_homme_c + $deuxime_lign_femme_c + $deuxime_lign_homme_P + $deuxime_lign_femme_P;
            $totale_dernier_3lign = $troisieme_lign_homme_c + $troisieme_lign_femme_c + $troisieme_lign_homme_P + $troisieme_lign_femme_P;
            $totale_dernier_4lign = $quatrieme_lign_homme_c + $quatrieme_lign_femme_c + $quatrieme_lign_homme_P + $quatrieme_lign_femme_P;
            $totale_dernier_5lign = $cinquieme_lign_homme_c + $cinquieme_lign_femme_c + $cinquieme_lign_homme_P + $cinquieme_lign_femme_P;
            $totale_dernier_6lign = $sixieme_lign_homme_c + $sixieme_lign_femme_c + $sixieme_lign_homme_P + $sixieme_lign_femme_P;
            $totales = $totale_1colonn_c + $totale_2colonn_c + $totale_3colonn_c + $totale_4colonn_c + $totale_1colonn_p + $totale_2colonn_p + $totale_3colonn_p + $totale_4colonn_p;
            //fin




            //calcul condamnation aux travaux forcer
 
            $hommes_1lign_1colonne = Condamner::selectRaw('SUM(CASE
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
                ELSE 0
                END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', 'majeur')
            ->where('status', 'Travaux Force')
            ->where('sexe', 'Homme')
            ->havingRaw('somme_peine <= 120')
            ->count();



            $hommes_1lign_2colonne = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine > 120 AND somme_peine <= 240')
            ->count();

            $hommes_1lign_3colonne = Condamner::selectRaw('SUM(CASE
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
                ELSE 0
                END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine > 240') 
            ->count();           
            $hommes_1lign_4colonne =  condamner::where('age', '=', 'majeur')->where('status', '=', 'Travaux Force à perpétuité')->where('sexe', '=', 'Homme')->count();//a demander l'information a propos
            $hommes_1lign_5colonne = condamner::where('age', '=', 'majeur')->where('status', '=', 'peine de mort')->where('sexe', '=', 'Homme')->count();//a demander l'information a propos
            $tfTotaleHomme = $hommes_1lign_1colonne + $hommes_1lign_2colonne + $hommes_1lign_3colonne + $hommes_1lign_4colonne + $hommes_1lign_5colonne; 
            
            $femmes_2lign_1colonne = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine <= 120')
            ->count();

            $femmes_2lign_2colonne = Condamner::selectRaw('SUM(CASE
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
                ELSE 0
                END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine > 120 AND somme_peine <= 240')
            ->count();

            $femmes_2lign_3colonne = Condamner::selectRaw('SUM(CASE
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
                ELSE 0
                END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine > 240')
            ->count();

            $femmes_2lign_4colonne = condamner::where('age', '=', 'majeur')->where('status', '=', 'Travaux Force à perpétuité')->where('sexe', '=', 'Femme')->count();//a demander l'information a propos
            $femmes_2lign_5colonne = condamner::where('age', '=', 'majeur')->where('status', '=', 'peine de mort')->where('sexe', '=', 'Femme')->count();//a demander l'information a propos
            $tfTotaleFemme = $femmes_2lign_1colonne + $femmes_2lign_2colonne + $femmes_2lign_3colonne + $femmes_2lign_4colonne + $femmes_2lign_5colonne; 
            
            $garçcon_3lign_1colonne = Condamner::selectRaw('SUM(CASE
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
                ELSE 0
                END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine <= 120')
            ->count();

            $garçcon_3lign_2colonne = Condamner::selectRaw('SUM(CASE
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
                ELSE 0
                END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine > 120 AND somme_peine <= 240')
            ->count();

            $garçcon_3lign_3colonne = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine > 240')
            ->count();

            $garçcon_3lign_4colonne = condamner::where('age', '=', 'mineur')->where('status', '=', 'Travaux Force à perpétuité')->where('sexe', '=', 'Homme')->count();//a demander l'information a propos
            $garçcon_3lign_5colonne = condamner::where('age', '=', 'mineur')->where('status', '=', 'peine de mort')->where('sexe', '=', 'Homme')->count();//a demander l'information a propos
            $tfTotaleGarçon = $garçcon_3lign_1colonne + $garçcon_3lign_2colonne + $garçcon_3lign_3colonne + $garçcon_3lign_4colonne + $garçcon_3lign_5colonne; 
            
            $fille_2lign_1colonne = Condamner::selectRaw('SUM(CASE
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
                ELSE 0
                END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine <= 120')
            ->count();
            
            $fille_2lign_2colonne = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine > 120 AND somme_peine <= 240')
            ->count();

            $fille_2lign_3colonne = Condamner::selectRaw('SUM(CASE
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
                WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
                WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
                ELSE 0
                END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where('status', '=', 'Travaux Force')
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine > 240')
            ->count();

            $fille_2lign_4colonne = condamner::where('age', '=', 'mineur')->where('status', '=', 'Travaux Force à perpétuité')->where('sexe', '=', 'Femme')->count();//a demander l'information a propos
            $fille_2lign_5colonne = condamner::where('age', '=', 'mineur')->where('status', '=', 'peine de mort')->where('sexe', '=', 'Femme')->count();//a demander l'information a propos
            $tfTotaleFille = $fille_2lign_1colonne + $fille_2lign_2colonne + $fille_2lign_3colonne + $fille_2lign_4colonne + $fille_2lign_5colonne; 
            
            $total_1Colonne = $hommes_1lign_1colonne + $femmes_2lign_1colonne + $garçcon_3lign_1colonne + $fille_2lign_1colonne;
            $total_2Colonne = $hommes_1lign_2colonne + $femmes_2lign_2colonne + $garçcon_3lign_2colonne + $fille_2lign_2colonne;
            $total_3Colonne = $hommes_1lign_3colonne + $femmes_2lign_3colonne + $garçcon_3lign_3colonne + $fille_2lign_3colonne;
            $total_4Colonne = $hommes_1lign_4colonne + $femmes_2lign_4colonne + $garçcon_3lign_4colonne + $fille_2lign_4colonne;
            $total_5Colonne = $hommes_1lign_5colonne + $femmes_2lign_5colonne + $garçcon_3lign_5colonne + $fille_2lign_5colonne;
            $tfTotale = $total_1Colonne + $total_2Colonne + $total_3Colonne + $total_4Colonne + $total_5Colonne;
            //fin


            //calculer emprisonnement a rectifier urgent******************************************************************************
            // pour homme
            $hommes_1lign_1colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine BETWEEN 0 AND 12')
            ->count();

            $hommes_1lign_2colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine > 12 AND somme_peine <= 60')
            ->count();

            $hommes_1lign_3colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine > 60 AND somme_peine <= 120')
            ->count();

            $hommes_1lign_4colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine > 120')
            ->count();
            $EmpTotaleHomme =  $hommes_1lign_1colonne_prisonnement + $hommes_1lign_2colonne_prisonnement +  $hommes_1lign_3colonne_prisonnement +  $hommes_1lign_4colonne_prisonnement;

            // pour femme
            $femmes_2lign_1colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine BETWEEN 0 AND 12')
            ->count();

            $femmes_2lign_2colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine > 12 AND somme_peine <= 60')
            ->count();

            $femmes_2lign_3colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine > 60 AND somme_peine <= 120')
            ->count();

            $femmes_2lign_4colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'majeur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine > 120')
            ->count();
            $EmpTotaleFemme = $femmes_2lign_1colonne_prisonnement + $femmes_2lign_2colonne_prisonnement + $femmes_2lign_3colonne_prisonnement + $femmes_2lign_4colonne_prisonnement; 
            
            //pour garçon
            $garçcon_3lign_1colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine BETWEEN 0 AND 12')
            ->count();

            $garçcon_3lign_2colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine > 12 AND somme_peine <= 60')
            ->count();

            $garçcon_3lign_3colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine > 60 AND somme_peine <= 120')
            ->count();

            $garçcon_3lign_4colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Homme')
            ->havingRaw('somme_peine > 120')
            ->count();
            $EmpTotaleGarçon = $garçcon_3lign_1colonne_prisonnement + $garçcon_3lign_2colonne_prisonnement + $garçcon_3lign_3colonne_prisonnement + $garçcon_3lign_4colonne_prisonnement; 
            
            // pour fille
            $fille_2lign_1colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine BETWEEN 0 AND 12')
            ->count();

            $fille_2lign_2colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine > 12 AND somme_peine <= 60')
            ->count();

            $fille_2lign_3colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine > 60 AND somme_peine <= 120')
            ->count();

            $fille_2lign_4colonne_prisonnement = Condamner::selectRaw('SUM(CASE
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN FIND_IN_SET("jour", unite_peine) > 0 AND FIND_IN_SET("mois", unite_remise_peine) > 0 THEN ((CAST(COALESCE(peine, 0) AS SIGNED) / 30) - CAST(COALESCE(remise_peine, 0) AS SIGNED))
            WHEN FIND_IN_SET("mois", unite_peine) > 0 AND FIND_IN_SET("jour", unite_remise_peine) > 0 THEN (CAST(COALESCE(peine, 0) AS SIGNED) - (CAST(COALESCE(remise_peine, 0) AS SIGNED) / 30))
            WHEN remise_peine IS NULL OR unite_remise_peine IS NULL THEN (CAST(COALESCE(peine, 0) AS SIGNED) / IF (FIND_IN_SET("jour", unite_peine) > 0, 30, 1))
            ELSE 0
            END) as somme_peine')
            ->groupBy('id', 'unite_peine', 'unite_remise_peine', 'peine', 'remise_peine')
            ->where('age', '=', 'mineur')
            ->where(function ($query) {
                $query->where('status', 'Emprisonnement')
                    ->orWhere('status', 'Detention préventive');
            })
            ->where('sexe', '=', 'Femme')
            ->havingRaw('somme_peine > 120')
            ->count();
            $EmpTotaleFille = $fille_2lign_1colonne_prisonnement + $fille_2lign_2colonne_prisonnement + $fille_2lign_3colonne_prisonnement + $fille_2lign_4colonne_prisonnement;

            $EmpTotale_1colonne = $hommes_1lign_1colonne_prisonnement + $femmes_2lign_1colonne_prisonnement + $garçcon_3lign_1colonne_prisonnement + $fille_2lign_1colonne_prisonnement;
            $EmpTotale_2colonne = $hommes_1lign_2colonne_prisonnement + $femmes_2lign_2colonne_prisonnement + $garçcon_3lign_2colonne_prisonnement + $fille_2lign_2colonne_prisonnement;
            $EmpTotale_3colonne = $hommes_1lign_3colonne_prisonnement + $femmes_2lign_3colonne_prisonnement + $garçcon_3lign_3colonne_prisonnement + $fille_2lign_3colonne_prisonnement;
            $EmpTotale_4colonne = $hommes_1lign_4colonne_prisonnement + $femmes_2lign_4colonne_prisonnement + $garçcon_3lign_4colonne_prisonnement + $fille_2lign_4colonne_prisonnement;
            $empTotaux = $EmpTotale_1colonne + $EmpTotale_2colonne + $EmpTotale_3colonne + $EmpTotale_4colonne;
            //fin

            
            // pour le tableau inculpes,accuses,prevenus
            // pour homme
            $homme_1lign_1colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateActuelle, $dateIlYa12Mois) {
                    $query->where('.date_status', '>=', $dateIlYa12Mois)
                          ->where('date_status', '<=', $dateActuelle);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Homme')  
            ->count();
            $homme_1lign_2colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa12Mois, $dateIlYa24Mois) {
                    $query->where('.date_status', '>=', $dateIlYa24Mois)
                          ->where('date_status', '<=', $dateIlYa12Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Homme')
            ->count();
            $homme_1lign_3colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa36Mois, $dateIlYa24Mois) {
                    $query->where('.date_status', '>=', $dateIlYa36Mois)
                          ->where('date_status', '<=', $dateIlYa24Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Homme')
            ->count();
            $homme_1lign_4colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa60Mois, $dateIlYa36Mois) {
                    $query->where('.date_status', '>=', $dateIlYa60Mois)
                          ->where('date_status', '<=', $dateIlYa36Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Homme')
            ->count();
            $homme_1lign_5colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa120Mois, $dateIlYa60Mois) {
                    $query->where('.date_status', '>=', $dateIlYa120Mois)
                          ->where('date_status', '<=', $dateIlYa60Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Homme')
            ->count();
            $homme_1lign_6colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa180Mois, $dateIlYa120Mois) {
                    $query->where('.date_status', '>=', $dateIlYa180Mois)
                          ->where('date_status', '<=', $dateIlYa120Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Homme')
            ->count();
            $homme_1lign_7colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa180Mois) {
                    $query->where('date_status', '<=', $dateIlYa180Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Homme')
            ->count();
            $totale_prevennus_homme = $homme_1lign_1colonne_inculpes + $homme_1lign_2colonne_inculpes + $homme_1lign_3colonne_inculpes + $homme_1lign_4colonne_inculpes + $homme_1lign_5colonne_inculpes + $homme_1lign_6colonne_inculpes + $homme_1lign_7colonne_inculpes;


            // pour femme
            $femme_2lign_1colonne_inculpes =  prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateActuelle, $dateIlYa12Mois) {
                    $query->where('.date_status', '>=', $dateIlYa12Mois)
                          ->where('date_status', '<=', $dateActuelle);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $femme_2lign_2colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa12Mois, $dateIlYa24Mois) {
                    $query->where('.date_status', '>=', $dateIlYa24Mois)
                          ->where('date_status', '<=', $dateIlYa12Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $femme_2lign_3colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa36Mois, $dateIlYa24Mois) {
                    $query->where('.date_status', '>=', $dateIlYa36Mois)
                          ->where('date_status', '<=', $dateIlYa24Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $femme_2lign_4colonne_inculpes =  prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa60Mois, $dateIlYa36Mois) {
                    $query->where('.date_status', '>=', $dateIlYa60Mois)
                          ->where('date_status', '<=', $dateIlYa36Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $femme_2lign_5colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa120Mois, $dateIlYa60Mois) {
                    $query->where('.date_status', '>=', $dateIlYa120Mois)
                          ->where('date_status', '<=', $dateIlYa60Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $femme_2lign_6colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa180Mois, $dateIlYa120Mois) {
                    $query->where('.date_status', '>=', $dateIlYa180Mois)
                          ->where('date_status', '<=', $dateIlYa120Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $femme_2lign_7colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa180Mois) {
                    $query->where('date_status', '<=', $dateIlYa180Mois);
                    })
            ->where('age', '=', 'majeur')
            ->where('sexe', '=', 'Femme')
            ->count();
            $totale_prevennus_femme = $femme_2lign_1colonne_inculpes + $femme_2lign_2colonne_inculpes + $femme_2lign_3colonne_inculpes + $femme_2lign_4colonne_inculpes + $femme_2lign_5colonne_inculpes + $femme_2lign_6colonne_inculpes + $femme_2lign_7colonne_inculpes;


            // pour garçon
            $garçon_3lign_1colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateActuelle, $dateIlYa12Mois) {
                    $query->where('.date_status', '>=', $dateIlYa12Mois)
                          ->where('date_status', '<=', $dateActuelle);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Homme')
            ->count();

            $garçon_3lign_2colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa12Mois, $dateIlYa24Mois) {
                    $query->where('.date_status', '>=', $dateIlYa24Mois)
                          ->where('date_status', '<=', $dateIlYa12Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Homme')
            ->count();

            $garçon_3lign_3colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa36Mois, $dateIlYa24Mois) {
                    $query->where('.date_status', '>=', $dateIlYa36Mois)
                          ->where('date_status', '<=', $dateIlYa24Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Homme')
            ->count();

            $garçon_3lign_4colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa60Mois, $dateIlYa36Mois) {
                    $query->where('.date_status', '>=', $dateIlYa60Mois)
                          ->where('date_status', '<=', $dateIlYa36Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Homme')
            ->count();

            $garçon_3lign_5colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa120Mois, $dateIlYa60Mois) {
                    $query->where('.date_status', '>=', $dateIlYa120Mois)
                          ->where('date_status', '<=', $dateIlYa60Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Homme')
            ->count();

            $garçon_3lign_6colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa180Mois, $dateIlYa120Mois) {
                    $query->where('.date_status', '>=', $dateIlYa180Mois)
                          ->where('date_status', '<=', $dateIlYa120Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Homme')
            ->count();

            $garçon_3lign_7colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa180Mois) {
                    $query->where('date_status', '<=', $dateIlYa180Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Homme')
            ->count();
            $totale_prevennus_garçon = $garçon_3lign_1colonne_inculpes + $garçon_3lign_2colonne_inculpes + $garçon_3lign_3colonne_inculpes + $garçon_3lign_4colonne_inculpes + $garçon_3lign_5colonne_inculpes + $garçon_3lign_6colonne_inculpes + $garçon_3lign_7colonne_inculpes;
            // fin

            // pour fille
            $fille_3lign_1colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateActuelle, $dateIlYa12Mois) {
                    $query->where('.date_status', '>=', $dateIlYa12Mois)
                          ->where('date_status', '<=', $dateActuelle);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $fille_3lign_2colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa12Mois, $dateIlYa24Mois) {
                    $query->where('.date_status', '>=', $dateIlYa24Mois)
                          ->where('date_status', '<=', $dateIlYa12Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $fille_3lign_3colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa36Mois, $dateIlYa24Mois) {
                    $query->where('.date_status', '>=', $dateIlYa36Mois)
                          ->where('date_status', '<=', $dateIlYa24Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $fille_3lign_4colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa60Mois, $dateIlYa36Mois) {
                    $query->where('.date_status', '>=', $dateIlYa60Mois)
                          ->where('date_status', '<=', $dateIlYa36Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $fille_3lign_5colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa120Mois, $dateIlYa60Mois) {
                    $query->where('.date_status', '>=', $dateIlYa120Mois)
                          ->where('date_status', '<=', $dateIlYa60Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $fille_3lign_6colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa180Mois, $dateIlYa120Mois) {
                    $query->where('.date_status', '>=', $dateIlYa180Mois)
                          ->where('date_status', '<=', $dateIlYa120Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Femme')
            ->count();

            $fille_3lign_7colonne_inculpes = prevenus::where('status','=','non jugé')
            ->Where(function ($query) use ($dateIlYa180Mois) {
                    $query->where('date_status', '<=', $dateIlYa180Mois);
                    })
            ->where('age', '=', 'mineur')
            ->where('sexe', '=', 'Femme')
            ->count();
            $totale_prevennus_fille = $fille_3lign_1colonne_inculpes + $fille_3lign_2colonne_inculpes + $fille_3lign_3colonne_inculpes + $fille_3lign_4colonne_inculpes + $fille_3lign_5colonne_inculpes + $fille_3lign_6colonne_inculpes + $fille_3lign_7colonne_inculpes;
            
            $totale_prevenus_1colonne = $homme_1lign_1colonne_inculpes + $femme_2lign_1colonne_inculpes + $garçon_3lign_1colonne_inculpes + $fille_3lign_1colonne_inculpes;
            $totale_prevenus_2colonne = $homme_1lign_2colonne_inculpes + $femme_2lign_2colonne_inculpes + $garçon_3lign_2colonne_inculpes + $fille_3lign_2colonne_inculpes;
            $totale_prevenus_3colonne = $homme_1lign_3colonne_inculpes + $femme_2lign_3colonne_inculpes + $garçon_3lign_3colonne_inculpes + $fille_3lign_3colonne_inculpes;
            $totale_prevenus_4colonne = $homme_1lign_4colonne_inculpes + $femme_2lign_4colonne_inculpes + $garçon_3lign_4colonne_inculpes + $fille_3lign_4colonne_inculpes;
            $totale_prevenus_5colonne = $homme_1lign_5colonne_inculpes + $femme_2lign_5colonne_inculpes + $garçon_3lign_5colonne_inculpes + $fille_3lign_5colonne_inculpes;
            $totale_prevenus_6colonne = $homme_1lign_6colonne_inculpes + $femme_2lign_6colonne_inculpes + $garçon_3lign_6colonne_inculpes + $fille_3lign_6colonne_inculpes;
            $totale_prevenus_7colonne = $homme_1lign_7colonne_inculpes + $femme_2lign_7colonne_inculpes + $garçon_3lign_7colonne_inculpes + $fille_3lign_7colonne_inculpes;
            $totale_prevenus = $totale_prevenus_1colonne + $totale_prevenus_2colonne + $totale_prevenus_3colonne + $totale_prevenus_4colonne + $totale_prevenus_5colonne + $totale_prevenus_6colonne + $totale_prevenus_7colonne;

            // fin

            
            // tableau situation generale de la detension
            $homme_1lign_1colonne_detention = condamner::where('age', '=', 'majeur')->where('situation', '=', 'Evadé(e)')->where('sexe', '=', 'Homme')->count();
            $homme_1lign_2colonne_detention = condamner::where('age', '=', 'majeur')->where('situation', '=', 'Décès(e)')->where('sexe', '=', 'Homme')->count();
            $homme_1lign_3colonne_detention = condamner::where('age', '=', 'majeur')->where('situation', '=', 'Hospitalisé(e)')->where('sexe', '=', 'Homme')->count();
            $totale_homme_1lign = $homme_1lign_1colonne_detention + $homme_1lign_2colonne_detention + $homme_1lign_3colonne_detention;

            $femme_1lign_1colonne_detention = condamner::where('age', '=', 'majeur')->where('situation', '=', 'Evadé(e)')->where('sexe', '=', 'Femme')->count();
            $femme_1lign_2colonne_detention = condamner::where('age', '=', 'majeur')->where('situation', '=', 'Décès(e)')->where('sexe', '=', 'Femme')->count();
            $femme_1lign_3colonne_detention = condamner::where('age', '=', 'majeur')->where('situation', '=', 'Hospitalisé(e)')->where('sexe', '=', 'Femme')->count();
            $totale_femme_2lign = $femme_1lign_1colonne_detention + $femme_1lign_2colonne_detention + $femme_1lign_3colonne_detention;

            $garçon_1lign_1colonne_detention = condamner::where('age', '=', 'mineur')->where('situation', '=', 'Evadé(e)')->where('sexe', '=', 'Homme')->count();
            $garçon_1lign_2colonne_detention = condamner::where('age', '=', 'mineur')->where('situation', '=', 'Décès(e)')->where('sexe', '=', 'Homme')->count();
            $garçon_1lign_3colonne_detention = condamner::where('age', '=', 'mineur')->where('situation', '=', 'Hospitalisé(e)')->where('sexe', '=', 'Homme')->count();
            $totale_garçcon_3lign = $garçon_1lign_1colonne_detention + $garçon_1lign_2colonne_detention + $garçon_1lign_3colonne_detention;

            $fille_1lign_1colonne_detention = condamner::where('age', '=', 'mineur')->where('situation', '=', 'Evadé(e)')->where('sexe', '=', 'Femme')->count();
            $fille_1lign_2colonne_detention = condamner::where('age', '=', 'mineur')->where('situation', '=', 'Décès(e)')->where('sexe', '=', 'Femme')->count();
            $fille_1lign_3colonne_detention = condamner::where('age', '=', 'mineur')->where('situation', '=', 'Hospitalisé(e)')->where('sexe', '=', 'Femme')->count();
            $totale_fille_4lign = $fille_1lign_1colonne_detention + $fille_1lign_2colonne_detention + $fille_1lign_3colonne_detention;

            $totale_1colonn_detention = $homme_1lign_1colonne_detention + $femme_1lign_1colonne_detention + $garçon_1lign_1colonne_detention + $fille_1lign_1colonne_detention;
            $totale_2colonn_detention = $homme_1lign_2colonne_detention + $femme_1lign_2colonne_detention + $garçon_1lign_2colonne_detention + $fille_1lign_2colonne_detention;
            $totale_3colonn_detention = $homme_1lign_3colonne_detention + $femme_1lign_3colonne_detention + $garçon_1lign_3colonne_detention + $fille_1lign_3colonne_detention;
            $totale_detention = $totale_1colonn_detention + $totale_2colonn_detention + $totale_3colonn_detention;
            // fin

            // tableau pour classifictaion des prevenus
            $homme_1lign_1colonne_prevenus = prevenus::where('age', '=', 'majeur')->where('status', '=', 'non jugé')->where('sexe', '=', 'Homme')->count();
            $homme_1lign_2colonne_prevenus = prevenus::where('age', '=', 'majeur')->where('etat', '=', 'Cassassionnaire')->where('sexe', '=', 'Homme')->count();
            $homme_1lign_3colonne_prevenus = prevenus::where('age', '=', 'majeur')->where('etat', '=', 'Appelant')->where('sexe', '=', 'Homme')->count();
            $homme_1lign_4colonne_prevenus = prevenus::where('age', '=', 'majeur')->where('etat', '=', 'Opposant')->where('sexe', '=', 'Homme')->count();
            $homme_1lign_5colonne_prevenus = prevenus::where('age', '=', 'majeur')->where('status', '=', 'passagers(e)')->where('sexe', '=', 'Homme')->count();
            $totale_homme_1lign_prevenus = $homme_1lign_1colonne_prevenus + $homme_1lign_2colonne_prevenus + $homme_1lign_3colonne_prevenus + $homme_1lign_4colonne_prevenus + $homme_1lign_5colonne_prevenus;

            $femme_1lign_1colonne_prevenus = prevenus::where('age', '=', 'majeur')->where('status', '=', 'non jugé')->where('sexe', '=', 'Femme')->count();
            $femme_1lign_2colonne_prevenus = prevenus::where('age', '=', 'majeur')->where('etat', '=', 'Cassassionnaire')->where('sexe', '=', 'Femme')->count();
            $femme_1lign_3colonne_prevenus = prevenus::where('age', '=', 'majeur')->where('etat', '=', 'Appelant')->where('sexe', '=', 'Femme')->count();
            $femme_1lign_4colonne_prevenus = prevenus::where('age', '=', 'majeur')->where('etat', '=', 'Opposant')->where('sexe', '=', 'Femme')->count();
            $femme_1lign_5colonne_prevenus = prevenus::where('age', '=', 'majeur')->where('status', '=', 'passagers(e)')->where('sexe', '=', 'Femme')->count();
            $totale_femme_1lign_prevenus = $femme_1lign_1colonne_prevenus + $femme_1lign_2colonne_prevenus + $femme_1lign_3colonne_prevenus + $femme_1lign_4colonne_prevenus + $femme_1lign_5colonne_prevenus;
            
            $garçon_1lign_1colonne_prevenus = prevenus::where('age', '=', 'mineur')->where('status', '=', 'non jugé')->where('sexe', '=', 'Homme')->count();
            $garçon_1lign_2colonne_prevenus = prevenus::where('age', '=', 'mineur')->where('etat', '=', 'Cassassionnaire')->where('sexe', '=', 'Homme')->count();
            $garçon_1lign_3colonne_prevenus = prevenus::where('age', '=', 'mineur')->where('etat', '=', 'Appelant')->where('sexe', '=', 'Homme')->count();
            $garçon_1lign_4colonne_prevenus = prevenus::where('age', '=', 'mineur')->where('etat', '=', 'Opposant')->where('sexe', '=', 'Homme')->count();
            $garçon_1lign_5colonne_prevenus = prevenus::where('age', '=', 'mineur')->where('status', '=', 'passagers(e)')->where('sexe', '=', 'Homme')->count();
            $totale_garçon_1lign_prevenus = $garçon_1lign_1colonne_prevenus + $garçon_1lign_2colonne_prevenus + $garçon_1lign_3colonne_prevenus + $garçon_1lign_4colonne_prevenus + $garçon_1lign_5colonne_prevenus;

            $fille_1lign_1colonne_prevenus = prevenus::where('age', '=', 'mineur')->where('status', '=', 'non jugé')->where('sexe', '=', 'Femme')->count();
            $fille_1lign_2colonne_prevenus = prevenus::where('age', '=', 'mineur')->where('etat', '=', 'Cassassionnaire')->where('sexe', '=', 'Femme')->count();
            $fille_1lign_3colonne_prevenus = prevenus::where('age', '=', 'mineur')->where('etat', '=', 'Appelant')->where('sexe', '=', 'Femme')->count();
            $fille_1lign_4colonne_prevenus = prevenus::where('age', '=', 'mineur')->where('etat', '=', 'Opposant')->where('sexe', '=', 'Femme')->count();
            $fille_1lign_5colonne_prevenus = prevenus::where('age', '=', 'mineur')->where('status', '=', 'passagers(e)')->where('sexe', '=', 'Femme')->count();
            $totale_fille_1lign_prevenus = $fille_1lign_1colonne_prevenus + $fille_1lign_2colonne_prevenus + $fille_1lign_3colonne_prevenus + $fille_1lign_4colonne_prevenus + $fille_1lign_5colonne_prevenus;

            $totale_1colonn_prevenus = $homme_1lign_1colonne_prevenus + $femme_1lign_1colonne_prevenus + $garçon_1lign_1colonne_prevenus + $fille_1lign_1colonne_prevenus;
            $totale_2colonn_prevenus = $homme_1lign_2colonne_prevenus + $femme_1lign_2colonne_prevenus + $garçon_1lign_2colonne_prevenus + $fille_1lign_2colonne_prevenus;
            $totale_3colonn_prevenus = $homme_1lign_3colonne_prevenus + $femme_1lign_3colonne_prevenus + $garçon_1lign_3colonne_prevenus + $fille_1lign_3colonne_prevenus;
            $totale_4colonn_prevenus = $homme_1lign_4colonne_prevenus + $femme_1lign_4colonne_prevenus + $garçon_1lign_4colonne_prevenus + $fille_1lign_4colonne_prevenus;
            $totale_5colonn_prevenus = $homme_1lign_5colonne_prevenus + $femme_1lign_5colonne_prevenus + $garçon_1lign_5colonne_prevenus + $fille_1lign_5colonne_prevenus;
            $totale_prevenus_tout_colonne = $totale_1colonn_prevenus + $totale_2colonn_prevenus + $totale_3colonn_prevenus + $totale_4colonn_prevenus + $totale_5colonn_prevenus;
            // fin

            // tableau de recapitulation 
            //pour homme
            $homme_1lign_1colonne_Condamner = condamner::where('age', '=', 'majeur')->where('sexe', '=', 'Homme')->count();
            $homme_1lign_2colonne_pres = prevenus::where('age', '=', 'majeur')->where('sexe', '=', 'Homme')->count();
            $totale_1colonn_recapitul_homme = $homme_1lign_1colonne_Condamner +  $homme_1lign_2colonne_pres;

            // pOur femmme
            $femme_2lign_1colonne_Condamner = condamner::where('age', '=', 'majeur')->where('sexe', '=', 'Femme')->count();
            $femme_2lign_2colonne_pres = prevenus::where('age', '=', 'majeur')->where('sexe', '=', 'Femme')->count();
            $totale_1colonn_recapitul_femme = $femme_2lign_1colonne_Condamner + $femme_2lign_2colonne_pres;
           
            // POUR Garçon
            $garçon_1lign_1colonne_Condamner = condamner::where('age', '=', 'mineur')->where('sexe', '=', 'Homme')->count();
            $garçon_1lign_2colonne_pres = prevenus::where('age', '=', 'mineur')->where('sexe', '=', 'Homme')->count();
            $totale_1colonn_recapitul_garçon = $garçon_1lign_1colonne_Condamner +  $garçon_1lign_2colonne_pres;

            // POUR fille
            $fille_1lign_1colonne_Condamner = condamner::where('age', '=', 'mineur')->where('sexe', '=', 'Femme')->count();
            $fille_1lign_2colonne_pres = prevenus::where('age', '=', 'mineur')->where('sexe', '=', 'Femme')->count();
            $totale_1colonn_recapitul_fille = $fille_1lign_1colonne_Condamner +  $fille_1lign_2colonne_pres;

            $totale_recapitulation_1colonn = $homme_1lign_1colonne_Condamner + $femme_2lign_1colonne_Condamner + $garçon_1lign_1colonne_Condamner + $fille_1lign_1colonne_Condamner;
            $totale_recapitulation_2colonn = $homme_1lign_2colonne_pres + $femme_2lign_2colonne_pres + $garçon_1lign_2colonne_pres + $fille_1lign_2colonne_pres;
            $totale_finale_recapitaltion =  $totale_recapitulation_1colonn +  $totale_recapitulation_2colonn;
            // 

            // pour le tableau de verification
            $verify_prevenus = prevenus::count();
            $prevenus_tt = $totale_prevenus + $totale_prevenus_tout_colonne;
            $totale_verification = $tfTotale + $empTotaux + $verify_prevenus;


            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
    
            $dompdf = new Dompdf($options);
    
            $html = '<html><head><style>
            .container {
                margin-top: -10;
            }
            .table-container {
                width: 48%;
            }
            // .table-container-second {
            //     width: auto;
            //     display: flex;
            //     justify-content: space-between;
            // }
            // .items {
            //     display: flex;
            //     margin-top: 0;
            //     width: 50%;
            // }
            table {         
                margin-top: -40px;
                border-collapse: collapse; 
                margin-top: 10px;
                width: 100%;
            } 
            th, td { 
                border: 1px solid black; 
                padding: 3px;  /* Réduire la taille du padding à 5px */
                text-align: center; 
                font-size: 8px;  /* Réduire la taille de la police à 12px */
            } 
            h3{
                margin-bottom: -10px;
                text-decoration: underline;
            }
            //0344583924 gilbert
           </style></head><body style="text-align: left; font-size: 7px;margin: 0;">';
            $html .= '<h3 style = "text-align: center;font-size: 15px;margin-top: -40px;">Maison centrale de: '.$maison.' **** modèle:16</h3>';
            $html .= '<p style = "text-align: right;font-size: 15px;margin-top: -40px;">date: '.$datefinale.'</p>';
            $html .= '<div class="container">';
            $html .= '<h3>A.SITUATION NUMERIQUE GENERALE</h3>';
            $html .= '<table>';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th rowspan="2">Catégories</th>';
            $html .= '<th colspan="4">Condamnés</th>';
            $html .= '<th colspan="4">Prévenus</th>';
            $html .= '<th rowspan="2">Total</th>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<th> Hommes </th>';
            $html .= '<th> Femmes </th>';
            $html .= '<th> Garçons </th>';
            $html .= '<th> Filles </th>';
            $html .= '<th> Hommes </th>';
            $html .= '<th> Femmes </th>';
            $html .= '<th> Garçons </th>';
            $html .= '<th> Filles </th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td>Moins de 18 ans</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$Moin_18_garçcon_C.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$Moin_18_fille_C.'</td>';
            $html .= '<td></td>';
            $html .= '<td ></td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$Moin_18_garçcon_P.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$Moin_18_fille_P.'</td>';
            $html .= '<td>'.$totale_dernier_1lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>18 à 21 ans</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$deuxime_lign_homme_c.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$deuxime_lign_homme_c.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$deuxime_lign_homme_P.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$deuxime_lign_femme_P.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td>'.$totale_dernier_2lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>22 à 35 ans</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$troisieme_lign_homme_c.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$troisieme_lign_femme_c.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$troisieme_lign_homme_P.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$troisieme_lign_femme_P.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td>'.$totale_dernier_3lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>36 à 49 ans</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$quatrieme_lign_homme_c.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$quatrieme_lign_femme_c.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$quatrieme_lign_homme_P.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$quatrieme_lign_femme_P.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td>'.$totale_dernier_4lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>50 à 59 ans</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$cinquieme_lign_homme_c.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$cinquieme_lign_femme_c.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$cinquieme_lign_homme_P.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$cinquieme_lign_femme_P.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td>'.$totale_dernier_5lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>60 ans et plus</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$sixieme_lign_homme_c.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$sixieme_lign_femme_c.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$sixieme_lign_homme_P.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$sixieme_lign_femme_P.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td>'.$totale_dernier_6lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>TOTAL</td>';
            $html .= '<td>'.$totale_1colonn_c.'</td>';
            $html .= '<td>'.$totale_2colonn_c.'</td>';
            $html .= '<td>'.$totale_3colonn_c.'</td>';
            $html .= '<td>'.$totale_4colonn_c.'</td>';
            $html .= '<td>'.$totale_1colonn_p.'</td>';
            $html .= '<td>'.$totale_2colonn_p.'</td>';
            $html .= '<td>'.$totale_3colonn_p.'</td>';
            $html .= '<td>'.$totale_4colonn_p.'</td>';
            $html .= '<td style="background: black;color: white;">'.$totales.'</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';



            // tableaux condamner tf
            $html .= '<h3>B.condamner aux travaux forces</h3>';
            $html .= '<table>';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th> Désignation </th>';
            $html .= '<th> 05 ans TF à 10 ans </th>';
            $html .= '<th> plus de 10 à 20 ans </th>';
            $html .= '<th> 20 ans et plus </th>';
            $html .= '<th> TF perpétuité </th>';
            $html .= '<th> Peine de mort </th>';
            $html .= '<th> Total </th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td>Hommes</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$hommes_1lign_1colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$hommes_1lign_2colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$hommes_1lign_3colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$hommes_1lign_4colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$hommes_1lign_5colonne.'</td>';
            $html .= '<td>'.$tfTotaleHomme.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Femmes</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$femmes_2lign_1colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$femmes_2lign_2colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$femmes_2lign_3colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$femmes_2lign_4colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$femmes_2lign_5colonne.'</td>';
            $html .= '<td>'.$tfTotaleFemme.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Garçons</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$garçcon_3lign_1colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$garçcon_3lign_2colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$garçcon_3lign_3colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$garçcon_3lign_4colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$garçcon_3lign_5colonne.'</td>';
            $html .= '<td>'.$tfTotaleGarçon.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Filles</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$fille_2lign_1colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$fille_2lign_2colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$fille_2lign_3colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$fille_2lign_4colonne.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$fille_2lign_5colonne.'</td>';
            $html .= '<td>'.$tfTotaleFille.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Total</td>';
            $html .= '<td>'.$total_1Colonne.'</td>';
            $html .= '<td>'.$total_2Colonne.'</td>';
            $html .= '<td>'.$total_3Colonne.'</td>';
            $html .= '<td>'.$total_4Colonne.'</td>';
            $html .= '<td>'.$total_5Colonne.'</td>';
            $html .= '<td  style="background: rgb(0,163,74);">'.$tfTotale.'</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';

            //tableau emprisone
            $html .= '<h3> C.CONDAMNERS A EMPRISONNEMENT</h3>';
            $html .= '<table>';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th> Désignation </th>';
            $html .= '<th> 01 mois à 01 ans </th>';
            $html .= '<th> plus de 01 à 05 ans </th>';
            $html .= '<th> plus de 05 à 10 ans </th>';
            $html .= '<th> plus de 10 ans </th>';
            $html .= '<th> Totale </th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td>Hommes</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$hommes_1lign_1colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$hommes_1lign_2colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$hommes_1lign_3colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$hommes_1lign_4colonne_prisonnement.'</td>';
            $html .= '<td>'.$EmpTotaleHomme.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Femmes</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$femmes_2lign_1colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$femmes_2lign_2colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$femmes_2lign_3colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$femmes_2lign_4colonne_prisonnement.'</td>';
            $html .= '<td>'.$EmpTotaleFemme.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Garçons</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$garçcon_3lign_1colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$garçcon_3lign_2colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$garçcon_3lign_3colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$garçcon_3lign_4colonne_prisonnement.'</td>';
            $html .= '<td>'.$EmpTotaleGarçon.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Filles</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$fille_2lign_1colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$fille_2lign_2colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$fille_2lign_3colonne_prisonnement.'</td>';
            $html .= '<td style="background: rgb(252,228,241);">'.$fille_2lign_4colonne_prisonnement.'</td>';
            $html .= '<td>'.$EmpTotaleFille.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Total</td>';
            $html .= '<td>'.$EmpTotale_1colonne.'</td>';
            $html .= '<td>'.$EmpTotale_2colonne.'</td>';
            $html .= '<td>'.$EmpTotale_3colonne.'</td>';
            $html .= '<td>'.$EmpTotale_4colonne.'</td>';
            $html .= '<td style="background: rgb(255,192,0);">'.$empTotaux.'</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';
            // tableau prevenus,accuse
            $html .= '<h3>D.tableau prevenus,accuse,inculpes</h3>';
            $html .= '<table>';
            $html .= '<tr>';
            $html .= '<th rowspan="2">Désignation</th>';
            $html .= '<th colspan="7">durées de la detention préventive</th>';
            $html .= '<th rowspan="2">Total</th>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<th> 01 mois à 01 an </th>';
            $html .= '<th> plus de 01 à 02 ans </th>';
            $html .= '<th> plus de 02 à 03 ans </th>';
            $html .= '<th> plus de 03 à 05 ans </th>';
            $html .= '<th> plus de 05 à 10 ans </th>';
            $html .= '<th> plus de 10 à 15 ans </th>';
            $html .= '<th> plus de 15 ans </th>';
            $html .= '</tr>';
            $html .= '<thead>';
            $html .= '</thead>';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td>Hommes</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$homme_1lign_1colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$homme_1lign_2colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$homme_1lign_3colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$homme_1lign_4colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$homme_1lign_5colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$homme_1lign_6colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$homme_1lign_7colonne_inculpes.'</td>';
            $html .= '<td>'.$totale_prevennus_homme.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Femmes</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$femme_2lign_1colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$femme_2lign_2colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$femme_2lign_3colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$femme_2lign_4colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$femme_2lign_5colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$femme_2lign_6colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$femme_2lign_7colonne_inculpes.'</td>';
            $html .= '<td>'.$totale_prevennus_femme.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Garçons</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$garçon_3lign_1colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$garçon_3lign_2colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$garçon_3lign_3colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$garçon_3lign_4colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$garçon_3lign_5colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$garçon_3lign_6colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$garçon_3lign_7colonne_inculpes.'</td>';
            $html .= '<td>'.$totale_prevennus_garçon.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Filles</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$fille_3lign_1colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$fille_3lign_2colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$fille_3lign_3colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$fille_3lign_4colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$fille_3lign_5colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$fille_3lign_6colonne_inculpes.'</td>';
            $html .= '<td style="background: rgb(221,235,247);">'.$fille_3lign_7colonne_inculpes.'</td>';
            $html .= '<td>'.$totale_prevennus_fille.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Total</td>';
            $html .= '<td>'.$totale_prevenus_1colonne.'</td>';
            $html .= '<td>'.$totale_prevenus_2colonne.'</td>';
            $html .= '<td>'.$totale_prevenus_3colonne.'</td>';
            $html .= '<td>'.$totale_prevenus_4colonne.'</td>';
            $html .= '<td>'.$totale_prevenus_5colonne.'</td>';
            $html .= '<td>'.$totale_prevenus_6colonne.'</td>';
            $html .= '<td>'.$totale_prevenus_7colonne.'</td>';
            $html .= '<td style="background: rgb(0,176,240);">'.$totale_prevenus.'</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';
            // tableau situation generale de la detension
            $html .= '<h3>E.situation générale de la detension</h3>';
            $html .= '<table>';
            $html .= '<tr>';
            $html .= '<th> Désignation </th>';
            $html .= '<th> Evasion </th>';
            $html .= '<th> Décès </th>';
            $html .= '<th> Hospitalisation </th>';
            $html .= '<th> Total </th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td>Hommes</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$homme_1lign_1colonne_detention.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$homme_1lign_2colonne_detention.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$homme_1lign_3colonne_detention.'</td>';
            $html .= '<td>'.$totale_homme_1lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Femmes</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$femme_1lign_1colonne_detention.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$femme_1lign_2colonne_detention.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$femme_1lign_3colonne_detention.'</td>';
            $html .= '<td>'.$totale_femme_2lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Garçons</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$garçon_1lign_1colonne_detention.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$garçon_1lign_2colonne_detention.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$garçon_1lign_3colonne_detention.'</td>';
            $html .= '<td>'.$totale_garçcon_3lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Filles</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$fille_1lign_1colonne_detention.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$fille_1lign_2colonne_detention.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$fille_1lign_3colonne_detention.'</td>';
            $html .= '<td>'.$totale_fille_4lign.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Total</td>';
            $html .= '<td>'.$totale_1colonn_detention.'</td>';
            $html .= '<td style="background: rgb(253,95,0);">'.$totale_2colonn_detention.'</td>';
            $html .= '<td style="background: rgb(254,191,0);">'.$totale_3colonn_detention.'</td>';
            $html .= '<td style="background: rgb(254,191,0);">'.$totale_detention.'</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';
            // classification des prevenus
            $html .= '<h3>F.classification des prevenus</h3>';
            $html .= '<table>';
            $html .= '<tr>';
            $html .= '<th> Désignation </th>';
            $html .= '<th> Non jugés </th>';
            $html .= '<th> Cassassionnaires </th>';
            $html .= '<th> Appelants </th>';
            $html .= '<th> Opposant </th>';
            $html .= '<th> Passagers </th>';
            $html .= '<th> Total </th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td>Hommes</td>';
            $html .= '<td style="background: rgb(226,239,218);">'. $homme_1lign_1colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'. $homme_1lign_2colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'. $homme_1lign_3colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'. $homme_1lign_4colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'. $homme_1lign_5colonne_prevenus.'</td>';
            $html .= '<td>'.$totale_homme_1lign_prevenus.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Femmes</td>';
            $html .= '<td style="background: rgb(226,239,218);">'. $femme_1lign_1colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'. $femme_1lign_2colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'. $femme_1lign_3colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'. $femme_1lign_4colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'. $femme_1lign_5colonne_prevenus.'</td>';
            $html .= '<td>'.$totale_femme_1lign_prevenus.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Garçons</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$garçon_1lign_1colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$garçon_1lign_2colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$garçon_1lign_3colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$garçon_1lign_4colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$garçon_1lign_5colonne_prevenus.'</td>';
            $html .= '<td>'.$totale_garçon_1lign_prevenus.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Filles</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$fille_1lign_1colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$fille_1lign_2colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$fille_1lign_3colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$fille_1lign_4colonne_prevenus.'</td>';
            $html .= '<td style="background: rgb(226,239,218);">'.$fille_1lign_5colonne_prevenus.'</td>';
            $html .= '<td>'.$totale_fille_1lign_prevenus.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Total</td>';
            $html .= '<td>'.$totale_1colonn_prevenus.'</td>';
            $html .= '<td>'.$totale_2colonn_prevenus.'</td>';
            $html .= '<td>'.$totale_3colonn_prevenus.'</td>';
            $html .= '<td>'.$totale_4colonn_prevenus.'</td>';
            $html .= '<td>'.$totale_5colonn_prevenus.'</td>';
            $html .= '<td style="background: rgb(0,176,240);">'.$totale_prevenus_tout_colonne.'</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';

            // recapitulation condamner et prevenus
            $html .= '<div class="table-container-second" style="margin-top: 3%;">'; 
            $html .= '<div class="items" style="display: inline-block; width: 40%; margin-right: 2%;">'; 
            $html .= '<h3>G.recapitulation condamner et prevenus</h3>';
            $html .= '<table>';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th> Désignation </th>';
            $html .= '<th> Condamner </th>';
            $html .= '<th> Prévénus </th>';
            $html .= '<th> Total </th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td>Hommes</td>';
            $html .= '<td>'.$homme_1lign_1colonne_Condamner.'</td>';
            $html .= '<td>'.$homme_1lign_2colonne_pres.'</td>';
            $html .= '<td>'.$totale_1colonn_recapitul_homme.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Femmes</td>';
            $html .= '<td>'.$femme_2lign_1colonne_Condamner.'</td>';
            $html .= '<td>'.$femme_2lign_2colonne_pres.'</td>';
            $html .= '<td>'.$totale_1colonn_recapitul_femme.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Garçons</td>';
            $html .= '<td>'.$garçon_1lign_1colonne_Condamner.'</td>';
            $html .= '<td>'.$garçon_1lign_2colonne_pres.'</td>';
            $html .= '<td>'.$totale_1colonn_recapitul_garçon.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Filles</td>';
            $html .= '<td>'.$fille_1lign_1colonne_Condamner.'</td>';
            $html .= '<td>'.$fille_1lign_2colonne_pres.'</td>';
            $html .= '<td>'.$totale_1colonn_recapitul_fille.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Total</td>';
            $html .= '<td style="background: rgb(255,255,0);">'.$totale_recapitulation_1colonn.'</td>';
            $html .= '<td style="background: rgb(0,176,240);">'.$totale_recapitulation_2colonn.'</td>';
            $html .= '<td style="background: rgb(0,0,0);color: white;">'.$totale_finale_recapitaltion.'</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</div>';

            //tableau de verification
            $html .= '<div class="items" style="display: inline-block; width: 40%;">';
            $html .= '<table>';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th>Tableau de vérification</th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td>Condamnés aux TF</td>';
            $html .= '<td style="background: rgb(0,176,80);">'.$tfTotale.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Condamner à empreisonnement</td>';
            $html .= '<td style="background: rgb(255,192,0);">'.$empTotaux.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>inculpés,accusés,prévenus</td>';
            $html .= '<td style="background: rgb(0,176,240);">'.$verify_prevenus.'</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>Totaux</td>';
            $html .= '<td style="background: rgb(0,0,0);color: white;">'.$totale_verification.'</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';


            $html .= '</body></html>';

            $dompdf->loadHtml($html);
            $dompdf->render();

    
            $dompdf->stream('tableauu_model16.pdf', [
                'Attachment' => true,
            ]);
        }
    }

    public function LibererImprime($id, Request $request){
        Carbon::setLocale('fr');
        $date =  $request->input('date');
        // $date_fin1 = Carbon::createFromFormat('Y-m-d', $date)->year;
        $date_fin1 = Carbon::createFromFormat('Y-m-d', $date);
        $dernier_chiffre =  substr($date_fin1->year, 2);


        $date_fin = Carbon::createFromFormat('Y-m-d', $date)->translatedFormat('j F Y');
        $maison = $request->input('maison');
        $destination = $request->input('destination');
        $motif = $request->input('motif');
        $liberer = liberer::find($id);
        $condamner = $liberer->ecrou_prevenus;
        $condamner_date = condamner_historie::where('condamner_id',$condamner);
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $imageFile = public_path('embleme.jpg');
            // $options->Image($imageFile, 10, 10, 100, 0, 'JPEG', '', '', true, 150, '', false, false, 1, false, false, false);

    
            $dompdf = new Dompdf($options);
    
            $html = '<html><head><style>
            
            .tete {
                display: flex;
            }

            .tete_milieu {
                margin-left: 0px;
                align-items: center;
                justify-content: center;
             }

             .tete_gauche {
                margin-left: 0%;
                position: absolute;
            }
            // .tete_gauche p {
            //     margin-top: 0; /* Ajustez cette valeur en fonction de vos besoins */
            //     margin-left: 0;
            // }
            
            .tete_gauche p{
                margin-top: -5px;
                margin-left: -50px;
            }
            // .tete_droite p{
            //     margin-top: -70px;
            // }

            
            
            h3{
                margin-bottom: 5px;
                text-decoration: underline;
            }
            //0344583924 gilbert
           </style></head><body style="text-align: left; font-size: 8px;">';
            $html .= '<div style="margin-bottom: 150px;margin-top: -20px;width: 100%">';
            $html .= '<div class="tete"style="margin-bottom: 20px;">';
            $html .= '<div class="tete_gauche"  style="display: inline-block; width: 30%;margin-left: 0%;">';
            $html .= '<p style = "text-align: center;font-size: 13 px;">Ministère de la justice</p>';
            $html .= '<p style = "text-align: center;font-size: 13 px;">Secrétaire Générale</p>';
            $html .= '<p style = "text-align: center;font-size: 13 px;">Direction Générale de l Administration.</p>';
            $html .= '<p style = "text-align: center;font-size: 13 px;">Pénitentiaire</p>';
            $html .= '<p style = "text-align: center;font-size: 13 px;">Direction Régionale de l Administration.</p>';
            $html .= '<p style = "text-align: center;font-size: 13 px;">Pénitentiaire</p>';
            $html .= '<p style = "text-align: center;font-size: 13 px;margin-left: -50px;">Haute Matsiatra</p>';
            $html .= '<p style = "text-align: center;font-size: 13 px;">Maison Centrale</p>';
            $html .= '<p style = "text-align: center;font-size: 13 px;">Fianarantsoa</p>';
            $html .= '</div>';
            $html .= '<div class="tete_milieu"  style="text-align: center;display: inline-block; width: 40%; margin-left: 35%;;margin-bottom: 02px;">';
            $html .= '<img src="data:image/jpg;base64,'.base64_encode(file_get_contents($imageFile)).'"  style="width: 40%;height: 8%;">';
            $html .= '<p style = "text-align: center;font-size: 13px;margin-right: 50px;">N°__/MJ/SG/DGAP/DRAP/HM/MC/Fia/Lib.'.$dernier_chiffre.'</h3>';
            $html .= '<p style = "text-align: right;font-size: 13px;margin-right: 50px;">CERTIFICAT DE MISE EN LIBERTE</p>';
            $html .= '<p style = "text-align: right;font-size: 13px;margin-right: 100px;margin-top: 15px;">******************</p>';
            $html .= '</div>';
            $html .= '<div class="tete_droite"style="position : absolute;right: 15px;text-align: center;display: inline-block; width: 10%;">';
            $html .= '<p style = "text-align: right;font-size: 12px;">modèle n°20</p>';
            $html .= '<p style = "text-align: right;font-size: 12px;">NS Prison</p>';
            $html .= '</div>';
            $html .= '</div';
            $html .= '<div style="align-items: center;justify-content: center;width: 50%;margin-top: 0px;">';
            $html .= '<p style = "font-size: 15px;margin-top: 5px;">le chef d etablissement Pénitentiaire de Fianarantsoa certifie que le </p>';
            if ($liberer->prenom){
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Nommé : ....................................................'.$liberer->nom.'   '.$liberer->prenom.'..................................................... </p>';
            }
            else{
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Nommé : .......................................'.$liberer->nom.'......................................... </p>';

            }

            if (strpos($liberer->naissance, '-') !== false) {
                $dateNaissance = Carbon::createFromFormat('Y-m-d H:i:s', $liberer->naissance);
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Né le : ...................................'.($dateNaissance->format('H:i:s') !== '00:00:00' ? $dateNaissance->translatedFormat('j F Y') : $dateNaissance->translatedFormat('j F Y')).'...................... a : .........................'.$liberer->lieu.'............................ </p>';
    
            }
            else{
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Né le : ...................................'.$liberer->naissance.'..................... a : .........................'.$liberer->lieu.'............................ </p>';
    
            }
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Fils de  : .................................'.$liberer->pere.'.............................. et de : ................................'.$liberer->mere.'.................................. </p>';
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>ecroué(e)le  : ......................................'.Carbon::createFromFormat('Y-m-d', $liberer->date_ecrou)->translatedFormat('j F Y').'.................... sous n° : .............'.$liberer->numero.'/'.$liberer->type.'........................................... </p>';
            
            if ($liberer->date_condamnation) {
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Condamné(e)le  : .....................'.Carbon::createFromFormat('Y-m-d', $liberer->date_condamnation)->translatedFormat('j F Y').'........................ a : .............'.$maison.'............par :.................................'.$liberer->mandataire.'................................... </p>';

            }
            else{
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Condamné(e)le  : ............................................ a : .............'.$maison.'............par :.................................'.$liberer->mandataire.'................................... </p>';
    
            }
            
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>pour  : ..........................................................'.$liberer->inculpation.'.................................................... </p>';
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>A été mis en liberté ce jour  : .........................'.Carbon::createFromFormat('Y-m-d', $liberer->date_liberation)->translatedFormat('j F Y').'............................................... </p>';
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>MOTIF  : .............................'.$motif.'................................................................ </p>';
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Il a déclaré se rendre à  : .....................'.$destination.'.................................. </p>';
            $html .= '</div';
            $html .= '</div';

            $html .= '<div style="display: inline-block">';
            $html .= '<div style="float: left;">';
            $html .= '<p style="font-size: 12px;">somme payée à la personne détenue</p>';
            $html .= '<p style="font-size: 12px;">LE GREFFIER-COMPTABLE</p>';
            $html .= '</div>';
            $html .= '<div class="ddf" style="float: right;">';
            $html .= '<p style="font-size: 12px;">à '.$maison.', '.$date_fin.'</p>';
            $html .= '<p style="font-size: 12px;">Le chef d\'établissement</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';

            
            // $html .= '<hr>';
       
            // deuxieme imprimer
            $html .= '<div style="margin-top: 70px;margin-bottom: 0px; width: 100%;">';
            $html .= '<div class="tete"style="margin-bottom: 0%;">';
            $html .= '<div class="tete_gauche" style="position: absolute; top: 480px; left: 0; margin: 50px 0 0 0; display: inline-block; width: 30%;font-size: 09px;">';
            $html .= '<p style = "text-align: center;font-size: 30 px;">Ministère de la justice</p>';
            $html .= '<p style = "text-align: center;font-size: 30 px;">Secrétaire Générale</p>';
            $html .= '<p style = "text-align: center;font-size: 30 px;">Direction Générale de l Administration.</p>';
            $html .= '<p style = "text-align: center;font-size: 30 px;">Pénitentiaire</p>';
            $html .= '<p style = "text-align: center;font-size: 30 px;">Direction Régionale de l Administration.</p>';
            $html .= '<p style = "text-align: center;font-size: 30 px;">Pénitentiaire</p>';
            $html .= '<p style = "text-align: center;font-size: 30 px;margin-left: -55px;">Haute Matsiatra</p>';
            $html .= '<p style = "text-align: center;font-size: 30 px;">Maison Centrale</p>';
            $html .= '<p style = "text-align: center;font-size: 30 px;">Fianarantsoa</p>';
            $html .= '</div>';
            $html .= '<div class="tete_milieu"  style="text-align: center;display: inline-block; width: 40%; margin-left: 35%;;margin-bottom: -35px;">';
            $html .= '<img src="data:image/jpg;base64,'.base64_encode(file_get_contents($imageFile)).'"  style="width: 40%;height: 13%;">';
            $html .= '<p style = "text-align: center;font-size: 15px;margin-right: 50px;">N°__/MJ/SG/DGAP/DRAP/HM/MC/Fia/Lib.'.$dernier_chiffre.'</h3>';
            $html .= '<p style = "text-align: right;font-size: 15px;margin-right: 50px;">CERTIFICAT DE MISE EN LIBERTE</p>';
            $html .= '<p style = "text-align: right;font-size: 15px;margin-right: 100px;margin-top: 5px;">******************</p>';
            $html .= '</div>';
            $html .= '<div class="tete_droite"style="position : relative;top : -95px;right: -85px;text-align: center;display: inline-block; width: 10%;">';
            $html .= '<p style = "text-align: right;font-size: 12px;">modèle n°20</p>';
            $html .= '<p style = "text-align: right;font-size: 12px;">NS Prison</p>';
            $html .= '</div>';
            $html .= '</div';
            $html .= '<div style="align-items: center;justify-content: center;width: 50%;margin-top: -350px;">';
            $html .= '<p style = "font-size: 15px;margin-top: 5px;">le chef d etablissement Pénitentiaire de Fianarantsoa certifie que le </p>';
            if ($liberer->prenom){
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Nommé : ....................................................'.$liberer->nom.'   '.$liberer->prenom.'..................................................... </p>';
            }
            else{
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Nommé : .......................................'.$liberer->nom.'......................................... </p>';

            }
            if (strpos($liberer->naissance, '-') !== false) {
                $dateNaissance = Carbon::createFromFormat('Y-m-d H:i:s', $liberer->naissance);
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Né le : ...................................'.($dateNaissance->format('H:i:s') !== '00:00:00' ? $dateNaissance->translatedFormat('j F Y') : $dateNaissance->translatedFormat('j F Y')).'...................... a : .........................'.$liberer->lieu.'............................ </p>';
    
            }
            else{
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Né le : ...................................'.$liberer->naissance.'..................... a : .........................'.$liberer->lieu.'............................ </p>';
    
            }    
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Fils de  : .................................'.$liberer->pere.'.............................. et de : ................................'.$liberer->mere.'.................................. </p>';
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>ecroué(e)le  : ......................................'.Carbon::createFromFormat('Y-m-d', $liberer->date_ecrou)->translatedFormat('j F Y').'.................... sous n° : .............'.$liberer->numero.'/'.$liberer->type.'........................................... </p>';
            if ($liberer->date_condamnation) {
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Condamné(e)le  : .....................'.Carbon::createFromFormat('Y-m-d', $liberer->date_condamnation)->translatedFormat('j F Y').'........................ a : .............'.$maison.'............par :.................................'.$liberer->mandataire.'................................... </p>';

            }
            else{
                $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Condamné(e)le  : ............................................ a : .............'.$maison.'............par :.................................'.$liberer->mandataire.'................................... </p>';
    
            }            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>pour  : ..........................................................'.$liberer->inculpation.'.................................................... </p>';
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>A été mis en liberté ce jour  : .........................'.Carbon::createFromFormat('Y-m-d', $liberer->date_liberation)->translatedFormat('j F Y').'............................................... </p>';
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>MOTIF  : .............................'.$motif.'................................................................ </p>';
            $html .= '<p style = "text-align: left;margin-top: -5px;font-size: 12px";>Il a déclaré se rendre à  : .....................'.$destination.'.................................. </p>';
            $html .= '</div';
            $html .= '</div';
            $html .= '<div style="display: inline-block">';
            $html .= '<div style="float: left;">';
            $html .= '<p style="font-size: 12px;">somme payée à la personne détenue</p>';
            $html .= '<p style="font-size: 12px;">LE GREFFIER-COMPTABLE</p>';
            $html .= '</div>';
            $html .= '<div class="ddf" style="float: right;">';
            $html .= '<p style="font-size: 12px;">à '.$maison.', le  '.$date_fin.'</p>';
            // $html .= '<p style="font-size: 12px;">à '.$maison.', le '.$date->translatedFormat('j F Y').'</p>';
            $html .= '<p style="font-size: 12px;">Le chef d\'établissement</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '</body></html>';
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            $dompdf->stream('certification_de_liberation.pdf', [
                'Attachment' => true,
            ]);

    }

    public function listage_condamner(){
        Carbon::setLocale('fr');
        $condamner = condamner::all();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'landscape');

        $html = '<html><head><style>
        .container {
            margin-top: -10;
        }
        .table-container {
            width: 48%;
        }
   
        table {         
            // margin-end: 10px;
            border-collapse: collapse; 
            // margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
        } 
        th, td { 
            border: 1px solid black; 
            padding: 7px;  /* Réduire la taille du padding à 5px */
            text-align: center; 
            font-size: 12px;  /* Réduire la taille de la police à 12px */
        } 
        h3{
            margin-bottom: -10px;
            text-decoration: underline;
        }

       </style></head><body style="text-align: left; font-size: 7px;margin: 50px;">';
        $html .= '<h3 style = "text-align: center;font-size: 15px;margin-top: -40px;">listage des condamner</h3>';
        $html .= '<div class="container">';
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>nom et prenom</th>';
        $html .= '<th>n° et type</th>';
        $html .= '<th>naissance</th>';
        $html .= '<th>genre</th>';
        $html .= '<th>status</th>';
        $html .= '<th>inculpation</th>';
        $html .= '<th>date d\'ecrou</th>';
        $html .= '<th>peine</th>';
        $html .= '<th>date de liberation</th>';
        $html .= '<th>classification</th>';
    
        $html .= '</tr>';
	    $html .= '</thead>';
        foreach ( $condamner as $condamners){
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>'.$condamners->nom.' '.$condamners->prenom.'</td>';
        $html .= '<td>'.$condamners->numero.'-'.$condamners->type.'</td>';
        if (strpos($condamners->naissance, '-') !== false) {
            $dateNaissance = Carbon::createFromFormat('Y-m-d H:i:s', $condamners->naissance);
            $html .= '<td>' .($dateNaissance->format('H:i:s') !== '00:00:00' ? $dateNaissance->translatedFormat('j F Y') : $dateNaissance->translatedFormat('j F Y')).'</td>';
        }  
        else {
            $html .= '<td>'. $condamners->naissance.'</td>';
        }
        $html .= '<td>'.$condamners->sexe.'('.$condamners->age.')</td>';
        $html .= '<td>'.$condamners->status.'</td>';
        $html .= '<td>'.$condamners->inculpation.'</td>';
        $html .= '<td>'.Carbon::createFromFormat('Y-m-d', $condamners->date_ecrou)->translatedFormat('j F Y').'</td>';
        $html .= '<td>'.$condamners->peine.' '.$condamners->unite_peine.'</td>';
        $html .= '<td>'.Carbon::createFromFormat('Y-m-d', $condamners->date_fin_peine)->translatedFormat('j F Y').'</td>';
        $html .= '<td>'.$condamners->classification.'</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        }
        $html .= '</table>';

        $html .= '</div>';
        $html .= '</body></html>';
        $dompdf->loadHtml($html);
        $dompdf->render();


        $dompdf->stream('liste_condamer.pdf', [
            'Attachment' => true,
        ]);

    }
    public function listage_prevenus(){
        Carbon::setLocale('fr');
        $prevenus = prevenus::all();
        $prevenus_dll = prevenus::Where(function ($query) {
            $query->where('.status', '=', 'Cassassionnaire')
                  ->where('status', '<=','Appelant')
                  ->where('status', '<=','Passager')
                  ->where('status', '<=','Opposant');
            });
        $options = new Options();
        
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'landscape');

        $html = '<html><head><style>
        .container {
            margin-top: -10;
        }
        .table-container {
            width: 48%;
        }
   
        table {         
            // margin-end: 10px;
            border-collapse: collapse; 
            // margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
        } 
        th, td { 
            border: 1px solid black; 
            padding: 7px;  /* Réduire la taille du padding à 5px */
            text-align: center; 
            font-size: 12px;  /* Réduire la taille de la police à 12px */
        } 
        h3{
            margin-bottom: -10px;
            text-decoration: underline;
        }

       </style></head><body style="text-align: left; font-size: 7px;margin: 50px;">';
        $html .= '<h3 style = "text-align: center;font-size: 15px;margin-top: -40px;">listage des prevenus</h3>';
        $html .= '<div class="container">';
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>nom et prenom</th>';
        $html .= '<th>Dossier n°</th>';
        $html .= '<th>naissance</th>';
        $html .= '<th>genre</th>';
        $html .= '<th>status</th>';
        $html .= '<th>inculpation</th>';
        $html .= '<th>date d\'ecrou</th>';
        $html .= '<th>duréé du MD</th>';
        $html .= '<th>MD</th>';
        $html .= '<th>observation</th>';
    
        $html .= '</tr>';
	    $html .= '</thead>';
        foreach ( $prevenus as $prevenuses){
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>'.$prevenuses->nom. ' ' .$prevenuses->prenom.'</td>';
        $html .= '<td>'.$prevenuses->numero.'-'.$prevenuses->type.'</td>';

        if (strpos($prevenuses->naissance, '-') !== false) {
            $dateNaissance = Carbon::createFromFormat('Y-m-d H:i:s', $prevenuses->naissance);
            $html .= '<td>' .($dateNaissance->format('H:i:s') !== '00:00:00' ? $dateNaissance->translatedFormat('j F Y') : $dateNaissance->translatedFormat('j F Y')).'</td>';
        }  
        else {
            $html .= '<td>'. $prevenuses->naissance.'</td>';
        }
      
        $html .= '<td>'.$prevenuses->sexe.'('.$prevenuses->age.')</td>';
        $html .= '<td>'.$prevenuses->status.'</td>';
        $html .= '<td>'.$prevenuses->inculpation.'</td>';
        $html .= '<td>'.Carbon::createFromFormat('Y-m-d', $prevenuses->date_ecrou)->translatedFormat('j F Y').'</td>';
        $html .= '<td>'.$prevenuses->peine.' '.$prevenuses->unite_peine.'</td>';
        $html .= '<td>'.Carbon::createFromFormat('Y-m-d', $prevenuses->date_fin_peine)->translatedFormat('j F Y').'</td>';
        $html .= '<td>'.$prevenuses->observation.'</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        }
        $html .= '</table>';
        $html .= '</div>';

        // tableau cassassionaire,opposant et appelant
        $html .= '<h3 style = "text-align: center;font-size: 15px;margin-bottom: 25px;">liste des prevenus Opposant,Appelant,Cassassionnaire</h3>';
        $html .= '<div class="container">';
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>nom et prenom</th>';
        $html .= '<th>n° et type</th>';
        $html .= '<th>naissance</th>';
        $html .= '<th>genre</th>';
        $html .= '<th>status</th>';
        $html .= '<th>etat</th>';
        $html .= '<th>inculpation</th>';
        $html .= '<th>date d\'ecrou</th>';
        $html .= '<th>peine</th>';
        $html .= '<th>date de liberation</th>';
        $html .= '<th>observation</th>';
    
        $html .= '</tr>';
	    $html .= '</thead>';
        foreach ( $prevenus_dll as $prevenu_dll){
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>'.$prevenu_dll->nom. ' ' .$prevenu_dll->prenom.'</td>';
        $html .= '<td>'.$prevenu_dll->numero.'-'.$prevenu_dll->type.'</td>';
        $html .= '<td>';

        if (strpos($prevenu_dll->naissance, '-') !== false) {
            $dateNaissance = Carbon::createFromFormat('Y-m-d H:i:s', $prevenu_dll->naissance);
            $html .= '<td>' .($dateNaissance->format('H:i:s') !== '00:00:00' ? $dateNaissance->translatedFormat('j F Y') : $dateNaissance->translatedFormat('j F Y')).'</td>';
        }  
        else {
            $html .= '<td>'. $prevenu_dll->naissance.'</td>';
        }

      
        $html .= '<td>'.$prevenu_dll->sexe.'('.$prevenu_dll->age.')</td>';
        $html .= '<td>'.$prevenu_dll->status.'</td>';
        $html .= '<td>'.$prevenu_dll->etat.'</td>';
        $html .= '<td>'.$prevenu_dll->inculpation.'</td>';
        $html .= '<td>'.Carbon::createFromFormat('Y-m-d', $prevenu_dll->date_ecrou)->translatedFormat('j F Y').'</td>';
        $html .= '<td>'.$prevenu_dll->peine.' '.$prevenu_dll->unite_peine.'</td>';
        $html .= '<td>'.Carbon::createFromFormat('Y-m-d', $prevenu_dll->date_fin_peine)->translatedFormat('j F Y').'</td>';
        $html .= '<td>'.$prevenu_dll->observation.'</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        }
        $html .= '</table>';

        $html .= '</div>';
        $html .= '</body></html>';
        $dompdf->loadHtml($html);
        $dompdf->render();


        $dompdf->stream('liste_prevenus.pdf', [
            'Attachment' => true,
        ]);

    }

    public function liberation_condition($id,Request $request){
        Carbon::setLocale('fr');
        $condamner = condamner::find($id);
        $maison = $request->input('maison');
        $conseil = $request->input('conseil');
        $destination = $request->input('destination');
        $deliquant = $request->input('deliquant');
        $recidiviste = $request->input('recidiviste');
        $precisier = $request->input('precisier');
        $encourue = $request->input('encourue');
        $indiquer = $request->input('indiquer');
        $legitime = $request->input('legitime');
        $travaillait = $request->input('travaillait');
        $vivait = $request->input('vivait');
        $appartenait = $request->input('appartenait');
        $niveau = $request->input('niveau');
        $religion = $request->input('religion');
        $observations = $request->input('observations');
        $date = $request->input('date');


        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $html = '<html><head><style>
       p{
        font-size : 10px;
        margin-bottom : -1px;
       }
        h3{
            margin-bottom: 10px;
            text-decoration: underline;
        }

       </style></head><body">';
        $html .= '<h3 style = "text-align: center;font-size: 15px;margin-top: -20px;">FICHE DE LIBERATION CONDITIONNELLE</h3>';
        $html .= '<p> Date de la requete ...........'.Carbon::createFromFormat('Y-m-d',$date)->translatedFormat('j F Y').'.............. par le conseil........'.$conseil.'..........par le condamne..............'.$condamner->nom.' '.$condamner->prenom.'.............</p>';
        $html .= '<p> Date d\'ecrou .........'.Carbon::createFromFormat('Y-m-d', $condamner->date_ecrou)->translatedFormat('j F Y').'................';
        $html .= '<p>ETABLISSEMENT DE  .........'.$maison.'................';
        $html .= '<h3 style = ";font-size: 13px;">I. EXTRAIT DE REGISTRE D\'ECROU DE CONDAMNER</h3>';
        $html .= '<p>N° d`ecrou: .........'.$condamner->id.'................ </p>';
        $html .= '<p>Nom: .............'.$condamner->nom.'............ </p>';
        $html .= '<p>prenom: ...........'.$condamner->prenom.'.............. </p>';
        if (strpos($condamner->naissance, '-') !== false) {
            $dateNaissance = Carbon::createFromFormat('Y-m-d H:i:s', $condamner->naissance);
            $html .= '<p>Né le: ...............'.($dateNaissance->format('H:i:s') !== '00:00:00' ? $dateNaissance->translatedFormat('j F Y') : $dateNaissance->translatedFormat('j F Y')).'............à.....'.$condamner->lieu.'.........FKT de............'.$condamner->cartier.'........commune de......'.$condamner->commune.'....... </p>';

        }
        else{
            $html .= '<p>Né le: ...............'.$condamner->naissance.'............à.....'.$condamner->lieu.'.........FKT de............'.$condamner->cartier.'........commune de......'.$condamner->commune.'....... </p>';

        }
        $html .= '<p>district de: ..........'.$condamner->district.'................region de.........'.$condamner->region.'...............................</p>';
        $html .= '<p>fils de: ...........'.$condamner->pere.'................et de...........'.$condamner->mere.'.............</p>';
        $html .= '<p>N° CIN: ...........'.$condamner->cin.'................Délivré le ...............'.$condamner->date_delivrance.'..........à.........'.$condamner->lieu.'........</p>';
        $html .= '<p>Domicilié à: ............'.$condamner->adresse.'...............FKT de ............'.$condamner->cartier1.'.............Commune de.......'.$condamner->commune1.'..........</p>';
        $html .= '<p>District de: .............'.$condamner->district1.'..............Région de..............'.$condamner->region1.'...........Commune de........'.$condamner->commune1.'.........</p>';
        $html .= '<p>Condamner le: ............'.Carbon::createFromFormat('Y-m-d', $condamner->date_status)->translatedFormat('j F Y').'...............Par............'.$condamner->mandataire.'............à.................</p>';
        $html .= '<p>Pour: ............'.$condamner->inculpation.'...............Par............'.$condamner->mandataire.'............à.................</p>';
        if ($condamner->date_fin_remise_peine !== null) {
        $html .= '<p>Libérale le: .........................'.Carbon::createFromFormat('Y-m-d', $condamner->date_fin_remise_peine)->translatedFormat('j F Y').'.........</p>...';
        } else {
            $html .= '<p>Libérale le: .........................'.Carbon::createFromFormat('Y-m-d', $condamner->date_fin_peine)->translatedFormat('j F Y').'...........</p>  .';
        }

        $html .= '........................</p>'; 

        $html .= '<p>remise de peine: ..................'.$condamner->remise_peine.'...................................</p>';  
        $html .= '<p>...............................................................................................................................</p>';
        $html .= '<p>DOMICILE A LA SORTIE DE L ETABLISSEMENT :.....................'.$destination.'..................................................</p>';
        $html .= '<p>DELINQUANT PRIMAIRE:....................'.$deliquant.'.....................................</p>';
        $html .= '<p>RECIDIVISTE        :........................'.$recidiviste.'............................</p>';
        $html .= '<p>Si oui:-Précisier le nombre de condamnation................................'.$precisier.'............................</p>';
        $html .= '<p>-Indiquer la peine la plus grave encourue.........................'.$encourue.'.....................</p>';
        $html .= '<p>-Indiquer le lieu où a été subie la dernière peine corporelle...................'.$indiquer.'............................</p>';
        if ($condamner->date_fin_remise_peine !== null) {
            $html .= '<p>-Indiquer la date de libération.....................'. Carbon::createFromFormat('Y-m-d',$condamner->date_fin_remise_peine)->translatedFormat('j F Y').'..........................</p>';
            } else {
                $html .= '<p>-Indiquer la date de libération.....................'. Carbon::createFromFormat('Y-m-d',$condamner->date_fin_peine)->translatedFormat('j F Y').'..........................</p>';
            }
       

        $html .= '<h3 style = "font-size: 13px;">II. NOTICE INDIVIDUELLE</h3>';
        $html .= '<h4 style = "text-decoration: underline;font-size: 13px;">ETAT CIVIL</h4>';
        $html .= '<p>Nom: .............'.$condamner->nom.'............ </p>';
        $html .= '<p>prenom: ...............'.$condamner->prenom.'.......... </p>';
        
        if (strpos($condamner->naissance, '-') !== false) {
            $dateNaissance = Carbon::createFromFormat('Y-m-d H:i:s', $condamner->naissance);
            $html .= '<p>Né le: ...............'.($dateNaissance->format('H:i:s') !== '00:00:00' ? $dateNaissance->translatedFormat('j F Y') : $dateNaissance->translatedFormat('j F Y')).'............à.....'.$condamner->lieu.'.........FKT de............'.$condamner->cartier.'............. </p>';

        }
        else{
            $html .= '<p>Né le: ...............'.$condamner->naissance.'............à.....'.$condamner->lieu.'.........FKT de............'.$condamner->cartier.'........... </p>';

        }

        $html .= '<p>commune de: ..........'.$condamner->commune.'.................District de............'.$condamner->district.'............</p>';
        $html .= '<p>.Région de: ..............'.$condamner->region.'................................</p>';
        $html .= '<p>Situation matrimoniale : ..................'.$condamner->marié.'.............................................</p>';
        $html .= '<p>Nombre d\'enfants légitimes ou naturels: ....................'.$condamner->enfant.'..................</p>';
        $html .= '<p>District de: .......................'.$condamner->district1.'..........................Commune de..........'.$condamner->commune1.'.......</p>';
        $html .= '<p>Le condamné est-il un enfant légitimes : ...................'.$legitime.'...........</p>';

        $html .= '<h4 style = "text-decoration: underline;font-size: 13px;">PROFESSION</h4>';
        $html .= '<p>-Quelle est la profession du condamné ..............'.$condamner->profession.'........... </p>';
        $html .= '<p>-Travaillait-il pour son compte ou pour autrui ............'.$travaillait.'............. </p>';
        $html .= '<p>-Vivait-il dans l\'oisiveté ..........'.$vivait.'............... </p>';
        $html .= '<p>-Appartenait-il à la population urbaine ou rurale ...........'.$appartenait.'.............. </p>';

        $html .= '<h4 style = "text-decoration: underline;font-size: 13px;">DEGRE D INSTRUCTION</h4>';
        $html .= '<p>-Quelle est son niveau d\'instruction ..........'.$niveau.'............... </p>';
        $html .= '<p>-Quelle est sa religion..............'.$religion.'........... </p>';
        $html .= '<p>-Autre et observations ............'.$observations.'............. </p>';

        $html .= '</body></html>';
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('demande de liberation conditionnelle.pdf', [
            'Attachment' => true,
            ]);

    }
}
