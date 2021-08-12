
@extends('theme.menu')
@section('contenu')
    <div class="container" style="display: inline-block;" >
            <div class="shadow-sm p-2 mb-3 bg-white rounded">
                <div class="panel-body">
                    <h3 class="text-uppercase font-weight-bold ">Indicateurs Sensibilisations</h3>
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
        <div class="row m-l-250 m-l-230">
          <div class="col-lg-2 col-sm-2">
                  <div class="card-box bg-blue">
                      <div class="inner">
                      <p> Personnes Sensibilisées </p>
                          <h3> {{$sens->sum('personnes')}} </h3>

                      </div>
                      <div class="icon">
                          <i class="fa fa-home" aria-hidden="true"></i>
                      </div>
                      <a href="#" class="card-box-footer"></a>
                  </div>
              </div>

              <div class="col-lg-2 col-sm-2">
                  <div class="card-box bg-green">
                      <div class="inner">
                          <p> Ménages sensibilisés </p>
                          <h3> {{$sens->sum('menage')}} </h3>
                      </div>
                      <div class="icon">
                          <i class="fa fa-money" aria-hidden="true"></i>
                      </div>
                      <a href="#" class="card-box-footer"></a>
                  </div>
              </div>
              <div class="col-lg-2 col-sm-4">
                  <div class="card-box bg-orange">
                      <div class="inner">
                          <p> Zonnes specifiques </p>
                          <h3> {{ 0 }} % </h3>
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
                      <p> Gestion des dechets</p>
                          <h3> {{ 0 }} </h3>

                      </div>
                      <div class="icon">
                          <i class="fa fa-users"></i>
                      </div>
                      <a href="#" class="card-box-footer"></a>
                  </div>
              </div>
              {{--<div class="col-lg-2 col-sm-4">
                  <div class="card-box bg-1">
                      <div class="inner">
                          <p> Sensibilisation de masse </p>
                          <h3> {{ $masse}}  </h3>
                      </div>
                      <div class="icon">
                          <i class="fa fa-users"></i>
                      </div>
                      <a href="#" class="card-box-footer"></a>
                  </div>
              </div>
--}}
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
                                              <form action="{{ route('importSensibilisation')}}" method="POST" enctype="multipart/form-data">
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
                              <div class="col-5">
                                  <div class="card h-100 justify-content-center">
                                      <div >
                                          <div  id="chart" style="height:500px;"></div>
                                          <?= Lava::render('PieChart','IMDB', 'chart') ?>
                                      </div>
                                   </div>
                              </div>
                              <div class="col-7">
                                  <div class="card h-100 justify-content-center">
                                  <div id="perf"  style="height:500px;" ></div>
                                  <?= Lava::render('ColumnChart','Finances', 'perf') ?>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
                 <div class="clearfix"></div>

           <!-- tableau -->
                <div class="row">
                      <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2> SENSIBILISATION SANITA</h2>
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
                                  Sensilisations effectuées
                                </p>
                               <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                <tr>
                                  <th>Sensibilisation</th>
                                  <th>Personnnes sensibilisées</th>
                                  <th>Ménages sensibilisés</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach($sens as $s)
                                      <tr>
                                        <td>{{ $s->type}}</td>
                                        <td>{{ $s->personnes }}</td>
                                        <td>{{ $s->menage }}</td>
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
         <br />
    </div>
   </div>


@endsection
