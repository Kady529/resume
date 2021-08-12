
@extends('theme.menu')
@section('contenu')
    <div class="container" style="display: inline-block;" >
        <div class="shadow-sm p-2 mb-3 bg-white rounded">
            <div class="panel-body">
                <h1 class="text-uppercase text-sm-left">Indicateurs Voiries</h1>
                <select class="btn btn-secondary form-select-sm pull-right" aria-label=".form-select-sm example">
                    <option value="1">2019</option>
                    <option value="2">2020</option>
                    <option selected>2021</option>
                    <option value="3">2022</option>
                    <option value="3">2023</option>
                </select>
            </div>
        </div>
          <!-- top tiles -->
        <div class="row center-block">
            <div class="col-md-2 col-sm-4">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <p>Route ( KM )</p>
                        <h3> {{ ($beton + $pavage)* 0.001 }}</h3>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-road" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer"></a>
                </div>
            </div>

            <div class="col-md-2 col-sm-4">
                <div class="card-box bg-green">
                    <div class="inner">
                        <p> Drainage (ml) </p>
                        <h3> {{ $drainage}}  </h3>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-resize-full" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer"></a>
                </div>
            </div>

            <div class="col-md-2 col-sm-4">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <p> Systeme opérationnel</p>
                        <h3> {{ 0  }} % </h3>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-random" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer"></a>
                </div>
            </div>
            <div class="col-lg-2 col-sm-4">
                <div class="card-box bg-red">
                    <div class="inner">
                        <p> Ouvriers apprenants</p>
                        <h3>{{ $apprenants[0]->t}} </h3>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-users"></i>
                    </div>
                    <a href="#" class="card-box-footer"></a>
                </div>
            </div>
        </div>
          <!-- /top tiles -->
          <div class="row">
            <div class="container">
              <div class="dashboard_graph">

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
                                          <form action="{{ route('VoiriesImport')}}" method="POST" enctype="multipart/form-data">
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
                   <div class="container h-100">
                          <div class="row align-items-center h-100">
                              <div class="col-6">
                                  <div class="card h-100 justify-content-center">
                                      <div >
                                          <div  id="chart-div" style="height: 400px;"></div>
                                          <?= Lava::render('PieChart','IMDB', 'chart-div') ?>
                                      </div>
                                 </div>
                              </div>
                              <div class="col-6">
                                  <div class="card h-100 justify-content-center">
                                  <div  id="chart" style="height: 400px;"></div>
                                    <?= Lava::render('ColumnChart','Apprenants', 'chart') ?>
                                  </div>
                              </div>
                          </div>
                    </div><div class="clearfix"></div>
                </div> <div class="clearfix"></div>
                      <div class="col-md-12 col-sm-12">
                          <div class="x_panel">
                              <div class="x_title">
                                  <h2>Projets en cours</h2>
                                  <div class="clearfix"></div>
                              </div>
                              <div class="x_content">

                                  <table class="table">
                                      <thead>
                                      <tr>
                                          <th>Nom</th>
                                          <th>Route( km )</th>
                                          <th>Drainage</th>
                                          <th style="width:40%;">Avancement</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          @foreach($projet as $p)
                                              <tr>
                                                  <td>{{ $p->quartier."( ". $p->commune." )" }}</td>
                                                  <td>{{ ($p->pavage + $p->beton)*0.001}}</td>
                                                  <td>{{ ($p->drainage)}}</td>
                                                  <td>
                                                      <div class="progress">
                                                          <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $p->avancement}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $p->avancement}}%;">
                                                              <span>{{ $p->avancement }}%</span>
                                                          </div>
                                                      </div>
                                                  </td>
                                              </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>

                  <div class="clearfix"></div>
              <!-- tableau -->
                <div class="row">
                      <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2> Aménagement des voiries</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                <p class="text-muted font-13 m-b-30">
                                  Informations sur les voiries
                                </p>
                               <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th>Lot</th>
                                      <th>Types d'ouvrages</th>
                                      <th>Commune</th>
                                      <th>Quartier</th>
                                      <th>Drainage</th>
                                      <th>Beton</th>
                                      <th>Pavage</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                      @foreach($voiries as $s)
                                          <tr>
                                            <td>{{ $s->lot}}</td>
                                            <td>{{ $s->type}}</td>
                                            <td>{{ $s->commune}}</td>
                                            <td>{{ $s->quartier}}</td>
                                            <td>{{ $s->drainage }}</td>
                                            <td>{{ $s->beton}}</td>
                                            <td>{{ $s->pavage }}</td>
                                          </tr>
                                     @endforeach

                                  </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                <!-- tableau -->
            </div>
            </div>
          </div>
          </div>
          </div>
      </div>
     </div>
   </div>


@endsection
