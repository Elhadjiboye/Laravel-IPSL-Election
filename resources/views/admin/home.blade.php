@extends('layouts.template_admin')
@section('content')
        <div class="row">
        <div class="col-xs-12" >
            <h3>Statistiques Électorales
              <span class="pull-right" >
                <a href="print.php" class="btn btn-success btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Imprimer</a>
              </span>
            </h3>
          </div>
         <br /><br />
         <br /><br />



<div class="col-6 col-lg-3 mb-4 d-flex justify-content-center"style="margin-left: 100px;">
          <div class="app-card app-card-stat shadow-sm rounded bg-light h-100" style="border: 1px solid #e0e0e0; border-radius: 8px; transition: all 0.3s ease; background-color: #f8f9fa;">
               <div class="app-card-body p-3 p-lg-4 text-center">
                    <h4 class="stats-type mb-1" style="color: #333; font-size: 18px;">Postes Disponibles</h4>
                    <div class="stats-figure" style="color: #007bff; font-size: 24px; font-weight: bold;">{{$postes_disponible}}</div>
                    <div class="stats-meta" style="font-size: 14px; color: #007bff;">
                        <i class="fas fa-chair"></i>
                    </div>



               </div><!--//app-card-body-->
               <a class="app-card-link-mask" href="#"></a>
          </div><!--//app-card-->
          </div><!--//col-->

          <div class="col-6 col-lg-3 mb-4 d-flex justify-content-center">
          <div class="app-card app-card-stat shadow-sm rounded bg-light h-100" style="border: 1px solid #e0e0e0; border-radius: 8px; transition: all 0.3s ease; background-color: #f8f9fa;">
               <div class="app-card-body p-3 p-lg-4 text-center">
                    <h4 class="stats-type mb-1" style="color: #333; font-size: 18px;">Candidats en Lice</h4>
                    <div class="stats-figure" style="color: #007bff; font-size: 24px; font-weight: bold;">{{$nombre_candidat}}</div>
                    <div class="stats-meta text-success" style="font-size: 14px;color: #007bff;">
                    <i class="fas fa-user"></i>
                    </div>


               </div><!--//app-card-body-->
               <a class="app-card-link-mask" href="#"></a>
          </div><!--//app-card-->
          </div><!--//col-->



          <div class="col-6 col-lg-3 mb-4 d-flex justify-content-center">
          <div class="app-card app-card-stat shadow-sm rounded bg-light h-100" style="border: 1px solid #e0e0e0; border-radius: 8px; transition: all 0.3s ease; background-color: #f8f9fa;">
               <div class="app-card-body p-3 p-lg-4 text-center">
                    <h4 class="stats-type mb-1" style="color: #333; font-size: 18px;">Électeurs Inscrits</h4>
                    <div class="stats-figure" style="color: #007bff; font-size: 24px; font-weight: bold;">{{$nombre_electeur}}</div>
                    <div class="stats-meta text-success" style="font-size: 14px; color: #007bff;">
                    <i class="fas fa-users"></i>
                    </div>

               </div><!--//app-card-body-->
               <a class="app-card-link-mask" href="#"></a>
          </div><!--//app-card-->
          </div><!--//col-->



          <div class="col-xs-12">
            <h3>Décompte des votes
            </h3>
          </div>
        </div> <br /><br />
        <div class='row'>
              <div class='col-sm-6'>
                <div class='box box-solid'>
                  <div class='box-header with-border'>
                    <h4 class='box-title'><b>Présidentielle</b></h4>
                  </div>
                  <div class='box-body'>
                    <div class='chart'>
                      <canvas id='presidentielle' style='height:200px'></canvas>
                    </div>
                  </div>
                </div>
              </div>

              <div class='col-sm-6'>
                <div class='box box-solid'>
                  <div class='box-header with-border'>
                    <h4 class='box-title'><b>Délégué </b></h4>
                  </div>
                  <div class='box-body'>
                    <div class='chart'>
                      <canvas id='delegue' style='height:200px'></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
