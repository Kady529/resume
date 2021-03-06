@extends('theme.menu')
@section('contenu')
    <div class="container" >
            <div class="x_content">
                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="canackry-tab" data-toggle="tab" href="#conackry" role="tab" aria-controls="conackry" aria-selected="true">Canakry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kindia-tab" data-toggle="tab" href="#kindia" role="tab" aria-controls="kindia" aria-selected="false">Kindia</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="conackry" role="tabpanel" aria-labelledby="conackry-tab">
                        <div class="shadow-sm p-2 mb-3 bg-white rounded">
                            <div class="panel-body">
                                <h3 class="text-uppercase font-weight-bold ">Tableau de bord </h3><large>Indicateurs sanita de la ville de conakry pour l'anné 2020</large>
                            </div>
                        </div>
                        <div class="row m-l-250" >
                            <div class="col-lg-2 col-sm-2 col-xs-2">
                                <div class="card-box bg-blue">
                                    <div class="inner">
                                        <p> Déchets collectés à Conakry </p>
                                        <h3  style="font-size: 1vmax;"> {{ $os1 }} tonnes </h3>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                    </div>
                                    <a href="#" class="card-box-footer"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="card-box bg-green">
                                    <div class="inner">
                                        <p> Déchets collectés ZTT </p>
                                        <h3  style="font-size: 1vmax;"> {{ $os2 }} % </h3>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-recycle" aria-hidden="true"></i>
                                    </div>
                                    <a href="#" class="card-box-footer"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="card-box bg-orange">
                                    <div class="inner">
                                        <p> Bénéficiaires quartiers drainés</p>
                                        <h3  style="font-size: 1vmax;"> {{ $os3}} </h3>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    </div>
                                    <a href="#" class="card-box-footer"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="card-box bg-red">
                                    <div class="inner">
                                        <p> Quarties desenclavés</p>
                                        <h3  style="font-size: 1vmax;"> {{ $os4}}  </h3>

                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-road"></i>
                                    </div>
                                    <a href="#" class="card-box-footer"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="card-box bg-1">
                                    <div class="inner">
                                        <p> Taux de pénétration  Gesstion Dechéts </p>
                                        <h3  style="font-size: 1vmax;"> {{ $os5}}  </h3>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-recycle"></i>
                                    </div>
                                    <a href="#" class="card-box-footer"></a>
                                </div>
                            </div>
                        </div>

                        <!-- content -->
                        <div class="x_title">
                            <div class="panel row">
                                <!-- Model -->
                                @if(Auth::check())
                                    <div class="col-md-4 pull-right"><button type="button" class="btn btn-info bg-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Importer un fichier excel</button></div>
                                @endif
                                <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Nouveau import</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <form action="{{ route('ObjectifsImport')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" name="file" class="form-control">
                                                        <br>
                                                        <button class="btn btn-success">Importer des données</button>
                                                        {{-- <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a> --}}
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h1>Progression dans le temps du projet Sanita Villes propres</h1>
                                    </div>
                                    <div class="inline-block">
                                        <div class="slider-container" style="width: 100%">
                                            <input type="text" id="slider" class="slider" />
                                        </div>
                                        <div class="widget_summary " style="width: 90%">
                                            <div class="w_left text-left">
                                                <span>27 April 2018</span>
                                            </div>
                                            <div class="w_center w_55">
                                                <p class="text-center">{{ $nowdate }}</p>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                                                         aria-valuenow="{{ $ecoule['day'] }}" aria-valuemin="0" aria-valuemax="{{ $total}}" style="width:{{ $pourcentage }}%">
                                                        {{$pourcentage}} %
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <p class="text-right">27 June 2023 </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12  ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h1>Informations Générales</h1>
                                    </div>
                                    <div class="x_content">
                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                <div class="count">
                                                    <i class="fa glyphicon glyphicon-eur fa-2x"></i>
                                                    <h2 class="timer count-title count-number" data-to="35" data-speed="1500">35</h2>
                                                    <p class="count-text ">Budget Global</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="count">
                                                    <i class="fa fa-users fa-2x"></i>
                                                    <h2 class="timer count-title count-number" data-to="157" data-speed="1500">157</h2>
                                                    <p class="count-text ">Equipe Sanita</p>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="clearfix"></div>
                                        <div class="row text-center">
                                            <div class="col">
                                                <div class="counter">
                                                    <i class="fa fa-home fa-2x"></i>
                                                    <h2 class="timer count-title count-number" data-to="35" data-speed="1500">35</h2>
                                                    <p class="count-text ">ZTT</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="counter">
                                                    <i class="fa fa-building fa-2x"></i>
                                                    <h2 class="timer count-title count-number" data-to="2" data-speed="1500">2</h2>
                                                    <p class="count-text">Villes</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="counter">
                                                    <i class="fa fa-road fa-2x"></i>
                                                    <h2 class="timer count-title count-number" data-to="5" data-speed="1500">5</h2>
                                                    <p class="count-text ">Communes</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="counter">
                                                    <i class="fa fa-users fa-2x"></i>
                                                    <h2 class="timer count-title count-number" data-to="250" data-speed="1500">250</h2>
                                                    <p class="count-text ">Habitants Bénéficiaires</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="x_panel">
                            <div class="row">
                                <div class="col-md-12 col-sm-12  ">
                                    <div class="x_title panel-success">
                                        <h1>Liste des objectifs spécifiques</h1>
                                    </div>
                                    <div class="x_content">

                                    </div>
                                </div>
                            </div>
                            {{-- tableau --}}
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Intitulé indicateur</th>
                                                    <th>2019</th>
                                                    <th>2020</th>
                                                    <th>2021</th>
                                                    <th>2022</th>
                                                    <th>Unité</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($ospecifiques as $os)
                                                    <tr>
                                                        <td>{{ $os -> intitule_indicateur }}</td>
                                                        <td>{{ $os -> val_2019 }}</td>
                                                        <td>{{ $os -> val_2020 }}</td>
                                                        <td>{{ $os -> val_2021 }}</td>
                                                        <td>{{ $os -> val_2022 }}</td>
                                                        <td>{{ $os -> unite }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kindia" role="tabpanel" aria-labelledby="kindia-tab">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                        booth letterpress, commodo enim craft beer mlkshk aliquip
                    </div>
                </div>
            </div>
    </div>
        <script>
            (function () {
                'use strict';
                var init = function () {
                    var slider = new rSlider({
                        target: '#slider',
                        values: [2018, 2019, 2020, 2021, 2022, 2023],
                        range: true,
                        set: [2018, 2021],
                        onChange: function (vals) {
                            console.log(vals);
                        }
                    });
                };
                window.onload = init;
            })();
        </script>
@endsection
