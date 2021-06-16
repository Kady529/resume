
@extends('theme.menu')
@section('contenu')

    <div class="" >
        <div class="shadow-sm p-2 mb-3 bg-white rounded">
            <div class="panel-body">
                <h3 class="text-uppercase font-weight-bold ">Indicateurs Ztt</h3>
            </div>
        </div>
        <div class="row m-l-250">
              <div class="col-md-2 col-sm-4">
                  <div class="card-box bg-blue">
                      <div class="inner">
                          <p>Taux de couverture Ztt </p>
                          <h3> {{ 0 }} </h3>
                      </div>
                      <div class="icon">
                          <i class="fa fa-home" aria-hidden="true"></i>
                      </div>
                      <a href="#" class="card-box-footer"></a>
                  </div>
              </div>

              <div class="col-md-2 col-sm-4">
                  <div class="card-box bg-green">
                      <div class="inner">
                          <p>Taux de récouvrement PME</p>
                          <h3> {{ 0 }} </h3>
                      </div>
                      <div class="icon">
                          <i class="fa fa-money" aria-hidden="true"></i>
                      </div>
                      <a href="#" class="card-box-footer"></a>
                  </div>
              </div>

              <div class="col-md-2 col-sm-4">
                  <div class="card-box bg-orange">
                      <div class="inner">
                          <p> Pourcentage dechets valorisés</p>
                          <h3> {{0}} % </h3>
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
                      <p> Carbone équivalent évité ( t )</p>
                          <h3> {{0}} </h3>

                      </div>
                      <div class="icon">
                          <i class="fa fa-smoked"></i>
                      </div>
                      <a href="#" class="card-box-footer"></a>
                  </div>
              </div>
              <div class="col-lg-2 col-sm-4">
                  <div class="card-box bg-1">
                      <div class="inner">
                          <p> Validation schema directeur </p>
                          <h3> N/A </h3>
                      </div>
                      <div class="icon">
                          <i class="fa fa-users"></i>
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
                                              <form action="{{ route('fileImport')}}" method="POST" enctype="multipart/form-data">
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
                                                <div  id="ca_graph" style="height: 400px;"></div>
                                                   @columnchart('Finances', 'ca_graph')
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card h-100 justify-content-center">
                                        <div id="c" style="height: 400px;"></div>
                                           @columnchart('Finances1', 'c')
                                        {{--

                                      <div class="card-body">
                                          <form action="{{ route('fileImport') }}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              <input type="file" name="file" class="form-control">
                                              <br>
                                              <button class="btn btn-success">Import User Data</button>
                                              <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
                                          </form>
                                      </div>
                                      --}}
                                        </div>
                                    </div>
                                </div>
                          </div>
                      </div>
                    <div class="container h-100">
                      <div class="row align-items-center h-100">
                          <div class="col-6">
                              <div class="card h-100 justify-content-center">
                                  <div>
                                      <div id="chart-div" style="height: 400px;"></div>
                                      <?= Lava::render('PieChart', 'IMDB4', 'chart-div') ?>
                                  </div>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="card h-100 justify-content-center">
                                  <div>
                                  <div id="chart" style="height: 400px;"></div>
                                      <?= Lava::render('PieChart', 'IMDB', 'chart') ?>
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
                            <h2>Informations sur les zones de tri et de transit</h2>
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
                                  La liste des ztts
                                </p>
                               <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                <tr>
                                  <th>Code</th>
                                  <th>Bailleur</th>
                                  <th>Nom de la ZTT</th>
                                  <th>Commune</th>
                                  <th>Quartier</th>
                                  <th>Etat</th>
                                </tr>
                              </thead>
                              <tbody>

                                  @foreach($parcelles as $p)
                                      <tr>
                                        <td>{{ $p->num}}</td>
                                        <td>{{ $p->bailleur }}</td>
                                        <td>{{ $p->nom }}</td>
                                        <td>{{ $p->commune }}</td>
                                        <td>{{ $p->etat_pr}}</td>
                                        <td>{{ $p->etat}}</td>
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
         <br />
      </div>
     </div>
   </div>


@endsection
