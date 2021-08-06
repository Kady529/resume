<?php

namespace App\Http\Controllers;


use App\Ospecifique;
use App\parcelle;
use App\Parcelle_ztt;
use App\User;
use App\Voirie;
use App\reference;
use App\Sensibilisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Khill\Lavacharts\Lavacharts;
use Khill\Lavacharts\DataTables;
use Khill\Lavacharts\Exceptions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
//use Khill\Lavacharts\DataTables\DataFactory;
use App\Marche;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         //var_dump(auth()->guest());
        $date3 = strtotime('2018-04-27 08:00:00');
        $date2 = strtotime('2023-06-27 17:00:00');
        $now   = time();
        $nowdate =\Carbon\Carbon::parse($now)->format('d M Y');
        //dd($now);

         //jour ecoulé
        function dateEcoulee($date1, $date3)
        {
            $diff = abs($date1 - $date3);
            $retour = array();

            $tmp = $diff;
            $retour['second'] = $tmp % 60;

            $tmp = floor( ($tmp - $retour['second'])/60 );
            $retour['minute'] = $tmp % 60;

            $tmp = floor( ($tmp - $retour['minute'])/60 );
            $retour['hour'] = $tmp % 24;

            $tmp = floor( ($tmp - $retour['hour'])/24 );
            $retour['day'] = $tmp;

            return $retour;
        }
        $ecoule = (dateEcoulee($date3, $now));

        //jours restants
        function dateDiff($date1, $date2){
            $diff = abs($date1 - $date2);
            $retour = array();

            $tmp = $diff;
            $retour['second'] = $tmp % 60;

            $tmp = floor( ($tmp - $retour['second'])/60 );
            $retour['minute'] = $tmp % 60;

            $tmp = floor( ($tmp - $retour['minute'])/60 );
            $retour['hour'] = $tmp % 24;

            $tmp = floor( ($tmp - $retour['hour'])/24 );
            $retour['day'] = $tmp;

            return $retour;
        }
        $restants = (dateDiff($now, $date2) );
        $total = round($ecoule["day"] + $restants["day"],1);

        $date_2018 = 248;
        $date_2019 = 365;
        $date_2020 = 248;
        $date_2021 = 248;
        $date_2022 = 248;
        $pourcentage_2018 = round(($date_2018 * 100)/$total,0);
        $pourcentage_2019 = round(($date_2019 * 100)/$total,0);
        //dd($pourcentage_2019);
        $pourcentage = round(($ecoule['day']*100) / $total,0);
       //dd($pourcentage);

        //objectifs spécifiques
        $OS_nb_emplois = \DB::table("ospecifiques")->select("val_2020")->where('num_indicateur','GIN170111T_OS.1.1')->get()->toArray();
        $os1 = $OS_nb_emplois[0]->val_2020;
        //dd($OS_nb_emplois);
        $OS_nb_dechets = \DB::table("ospecifiques")->select("val_2020")->where('num_indicateur','GIN170111T_OS.2')->get()->toArray();
        $os2 = $OS_nb_dechets[0]->val_2020;
        $OS_pop_quart_drainés = \DB::table("ospecifiques")->select("val_2020")->where('num_indicateur','GIN170111T_OS.3')->get()->toArray();
        $os3 = $OS_pop_quart_drainés[0]->val_2020;
        $OS_pop_quart_desenclavés = \DB::table("ospecifiques")->select("val_2020")->where('num_indicateur','GIN170111T_OS.4')->get()->toArray();
        $os4 = $OS_pop_quart_desenclavés[0]->val_2020;
        $OS_taux_penetration = \DB::table("ospecifiques")->select("val_2020")->where('num_indicateur','GIN170111T_OS.5.1')->get()->toArray();
        $os5 = $OS_taux_penetration[0]->val_2020;

        $ospecifiques = Ospecifique::All();
        //dd($ospecifiques);
        return view('index')->with('ospecifiques',$ospecifiques)
                            ->with('os1',$os1)
                            ->with('os2',$os2)
                            ->with('os3',$os3)
                            ->with('os4',$os4)
                            ->with('os5',$os5)
                            ->with('ecoule',$ecoule)
                            ->with('total',$total)
                            ->with('pourcentage',$pourcentage)
                            ->with('pourcentage_2018',$pourcentage_2018)
                            ->with('pourcentage_2019',$pourcentage_2019)
                            ->with('nowdate',$nowdate);
    }
    public function ztt()
    {
        $lava = new Lavacharts;
        $lava1 = new Lavacharts;


        $reasons = $lava->DataTable();
        //$reasons1 = $lava1->DataTable();


        $ztt = \DB::table("parcelle_ztts")->select("*")->where("type","ZTT")->get()->count();
        $pr = \DB::table("parcelle_ztts")->select("*")->where("type","PR")->get()->count();
        $construction = \DB::table("parcelle_ztts")->select("*")->where("etat","En construction")->get()->count();
        $operationnelle = \DB::table("parcelle_ztts")->select("*")->where("etat","Opérationnel")->get()->count();
        $etude = \DB::table("parcelle_ztts")->select("*")->where("etat","LIKE","%Etudes%")->get()->count();
        $bailleur = \DB::table("parcelle_ztts")->select("*")->where("bailleur","UE")->get()->count();
        $categorie = \DB::table("parcelle_ztts")->select("*")->where("bailleur","BID")->get()->count();
        $commune = \DB::table("parcelle_ztts")->select("commune")->distinct()->get()->count();


        //dd($etude);
       /* $reasons->addStringColumn('nom')
                ->addNumberColumn('Surface disponible');

        foreach ($data as $key){
            //$data1 = \DB::table('Marches_Conakry')->select("s_disponib")->where("commune",$key->commune)->get();
            //dd($key->surface);
            $reasons -> addRow(array($key->nom));
        }
      */

             $reasons = \Lava::DataTable();
            $reasons->addStringColumn('Type')
                    ->addNumberColumn('Nombre')
                    ->addRow(['Prévus', $ztt])
                    ->addRow(['Contruites', $construction]);

                    \LAVA::ColumnChart('Finances', $reasons, [
                        'title' => 'Avancement de la construction des ZTT ',
                        'titleTextStyle' => [
                            'color'    => '#eb6b2c',
                            'fontSize' => 25,
                            'font-size' => 'serif'
                        ],
                        'legend' => [
                            'position' => 'in'
                        ]
                    ]);

            $reasons1 = \Lava::DataTable();
           $reasons1->addStringColumn('Statut')
                    ->addNumberColumn('Nombre')
                    ->addRow(['En Etude', $etude])
                    ->addRow(['En Construction', $construction])
                    ->addRow(['Opérationnelle', $operationnelle])
                    ;

                    \LAVA::ColumnChart('Finances1', $reasons1, [
                        'title' => 'Statut des infrastructures',
                        'titleTextStyle' => [
                            'color'    => '#eb6b2c',
                            'fontSize' => 25
                        ],
                        'legend' => [
                            'position' => 'in'
                        ],
                        'colors' => ['green','blue']
                    ]);


                      //ztt
                    $reasons3 = \Lava::DataTable();

                    $reasons3->addStringColumn('Statut')
                             ->addNumberColumn('Nombre');

                    $data = \DB::table("parcelle_ztts")->select( "commune",DB::raw('count(type) as types'))
                                                       ->where("type","ZTT")
                                                       ->groupBy("commune","type")
                                                       ->distinct()
                                                       ->get()->toArray();

                             foreach ($data as $key){
                                   $reasons3 -> addRow([$key->commune, $key->types]);
                                 }

                     \LAVA::PieChart('IMDB', $reasons3, [
                        'title'  => 'Nombre de ZTT par commune',
                        'titleTextStyle' => [
                            'color'    => '#eb6b2c',
                            'fontSize' => 25
                        ],
                        'is3D'   => true,
                        'slices' => [
                            ['offset' => 0.2],
                            ['offset' => 0.25],
                            ['offset' => 0.4]
                        ]
                    ]);

                        //bailleur
                        $reasons4 = \Lava::DataTable();

                        $reasons4->addStringColumn('Bailleur')
                                 ->addNumberColumn('Nombre')
                                 ->addRow(['UE', $bailleur])
                                 ->addRow(['BID', $categorie]);

                         \LAVA::PieChart('IMDB4', $reasons4, [
                            'title'  => 'ZTT par bailleur',
                            'titleTextStyle' => [
                                'color'    => '#eb6b2c',
                                'fontSize' => 25
                            ],
                            'is3D'   => true,
                            'slices' => [
                                ['offset' => 0.2],
                                ['offset' => 0.25],
                                ['offset' => 0.4]
                            ]
                        ]);

         $parcelles = Parcelle_ztt::All();
        return view('ztt')->with('lava',$lava)
                          ->with('lava1',$lava1)
                          ->with('parcelles',$parcelles)
                          ->with('ztt',$ztt)
                          ->with('construction',$construction)
                          ->with('commune',$commune)
                          ->with('operationnelle',$operationnelle);

    }
    public function sensibilisation()
    {
            $r= date('d-m-Y', strtotime(time()));

            $lvia = \DB::table("sensibilisations")->select("personnes")->where("ong","LVIA")->get()->count();
            $acph = \DB::table("sensibilisations")->select("personnes")->where("ong","OCPH")->get()->count();
            $causerie = \DB::table("sensibilisations")->select("*")->where("type","causerie_educative")->get()->count();
            $porte = \DB::table("sensibilisations")->select("*")->where("type","porte_a_porte")->get()->count();
            $scolaire = \DB::table("sensibilisations")->select("*")->where("type","scolaire")->get()->count();
            $masse = \DB::table("sensibilisations")->select("*")->where("type","masse")->get()->count();

            $lava = new Lavacharts;



            $votes = \Lava::DataTable();
              $votes->addStringColumn('Food Pol     l')
                    ->addNumberColumn('Type')
                    ->addRow(['Porte à porte', $porte])
                    ->addRow(['Masse',  $masse])
                    ->addRow(['Milieu scolaire', $scolaire])
                    ->addRow(['Causerie Edicative', $causerie]);

                \LAVA::PieChart('IMDB', $votes, [
                            'title'  => 'Type de sensibilisation',
                            'titleTextStyle' => [
                                'color'    => '#eb6b2c',
                                'fontSize' => 25
                            ],
                            'is3D'   => true,
                            'slices' => [
                                ['offset' => 0.2],
                                ['offset' => 0.25],
                                ['offset' => 0.4]
                            ],
                            'legend' => [
                                'position' => 'bottom'
                            ]

                        ]);
            //deuxiemme graphique
            $reasons = \Lava::DataTable();

            $data =\DB::table("sensibilisations")->select(DB::raw("sum(personnes) as Somme_personnes"),
                                                          DB::raw("sum(menage) as Somme_menages"),
                                                          DB::raw("to_char(date_sensib, 'Mon-YYYY') as new_date"))
                                                        ->groupBy("new_date")
                                                        ->get();
            //dd($data);
            $reasons->addStringColumn('Mois')
                ->addNumberColumn('Personnes Sensibilisées')
                ->addNumberColumn('Menages Sensibilisés');

            foreach ($data as $key){
                    $reasons -> addRow([$key->new_date, $key->Somme_personnes,$key->Somme_menages]);

            }

            \Lava::ColumnChart('Finances', $reasons, [
                'title' => 'Sensibilisation par mois',
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 25
                ],
                'legend' => [
                    'position' => 'in'
                ]
            ]);

            $sens = Sensibilisation::All();
            return view('sensibilisation')->with('sens',$sens)
                                                ->with('lava',$lava)
                                                ->with('porte',$porte)
                                                ->with('causerie',$causerie)
                                                ->with('scolaire',$scolaire)
                                                ->with('masse',$masse);

    }
    public function voiries()
    {

        $pavage_array = \DB::table("voiries")->select(DB::raw('sum(pavage) as somme_pavage'))->get()->toArray();
        $pavage = round($pavage_array[0]->somme_pavage,2);
        $drainage_array = \DB::table("voiries")->select(DB::raw('sum(drainage) as somme_drainage'))->get()->toArray();
        $drainage = round($drainage_array[0]->somme_drainage,2);
        $beton_array = \DB::table("voiries")->select(DB::raw('sum(beton) as somme_beton'))->get()->toArray();
        $beton = round($beton_array[0]->somme_beton,2);
        $total_pavage = $beton + $drainage;
         //dd($total_pavage);

        $commune = \DB::table("voiries")->select("commune")->distinct()->get()->count();
        $projet = \DB::table("voiries")->select("*")->where("avancement",">","0")->get();
        $type = \DB::table("voiries")->select("type")->distinct()->get()->count();
            //dd($drainage);
                    //premier graphique
                    $lava1 = new Lavacharts;

                    $votes = \Lava::DataTable();
                    $votes->addStringColumn('Statut')
                          ->addNumberColumn('Nombre');

                    $data = \DB::table("voiries")->select( "commune",DB::raw('count(rue) as types'))
                                                ->groupBy("commune")
                                                ->distinct()
                                                ->get();
                    //dd($data);
                    foreach ($data as $key){
                        $votes -> addRow([$key->commune, $key->types]);
                        }

                    \LAVA::PieChart('IMDB', $votes, [
                    'title'  => 'Nombre de projet par commune',
                    'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 25
                    ],
                    ]);

            //deuxieme
            $apprenants = \DB::table("voiries")->select(DB::raw('sum(ouvriersApprenants) as t'))->get()->toArray();
            $femmes = \DB::table("voiries")->select(DB::raw('sum(nbfemmes) as f'))->get()->toArray();
             //dd($femmes[0]->f);
            $ouvriers = \Lava::DataTable();
            $ouvriers->addStringColumn('Statut')
                                ->addNumberColumn('Nombre')
                                ->addRow(['Total apprenants', $apprenants[0]->t])
                                ->addRow(['Total femmes', $femmes[0]->f]);

                                \LAVA::ColumnChart('Apprenants', $ouvriers, [
                                    'title' => 'Nombre d\'ouvriers apprenants',
                                    'titleTextStyle' => [
                                        'color'    => 'red',
                                        'fontSize' => 25
                                    ],
                                    'legend' => [
                                        'position' => 'in'
                                    ]
                                ]);
        $v = \DB::table("voiries")->select('lot')->get()->toArray();
        $voiries = Voirie::All();

        return view('voiries')->with('voiries',$voiries)
                                    ->with('projet',$projet)
                                    ->with('pavage',$pavage)
                                    ->with('drainage',$drainage)
                                    ->with('beton',$beton)
                                    ->with('v',$v)
                                    ->with('femmes',$femmes)
                                    ->with('apprenants',$apprenants);

    }
    public function login(){
        return view('login');
    }

    public function traitement(Request $request)
    {

        $credentials = [
            'email' => $request['email'],
            'password' => md5($request['password']),
        ];

         $result = User::where([
             'email' => $request->email,
             'password' => md5($request->password)
         ])->first();
         //dd($result);
        if($result){
            dd(Auth::id());
        }else{
            dd($credentials);
        }
    }
}
