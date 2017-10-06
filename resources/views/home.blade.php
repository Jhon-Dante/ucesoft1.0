@extends('layouts.app')

@section('htmlheader_title')
	Inicio
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Escritorio
        <small>Área de trabajo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Escritorio</li>
      </ol>
    </section>
<!-- Main content -->
    <section class="content">
		<div class="row">
	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3>{{count($mensualidades)}}</h3>

	              <p>Mensualidades sin pagar</p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-link"></i>
	            </div>
	            <a href=" {{ url('admin/mensualidades')         }} " class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{count($datosBasicos)}}<!-- <sup style="font-size: 20px">%</sup> --></h3>

              <p>Estudiantes en total</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{count($preinscripcion)}}</h3>

              <p>Estudiantes preinscritos</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{count($inscripcion)}}</h3>

              <p>Estudiantes Inscritos</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

	<hr>
		
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Preinscritos</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Inscritos</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Estudiantes</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th style="width: 40px"></th>
                </tr>
                
                  @foreach($preinscripcion as $p)
                  <tr>
                    <td>{{$num=$num+1}}.-</td>
                    <td>{{$p->datosBasicos->nombres}}</td>
                    <td>{{$p->datosBasicos->apellidos}}</td>
                    <td>{{$p->datosBasicos->nacionalidad}} - {{$p->datosBasicos->cedula}}</td>

                  </tr>
                  @endforeach
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
            
          </div>

              </div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <div class="box-body">
              <table class="table table-bordered table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th style="width: 40px"></th>
                </tr>
                
                  @foreach($inscripcion as $p)
                  <tr>
                    <td>{{$num=$num+1}}.-</td>
                    <td>{{$p->datosBasicos->nombres}}</td>
                    <td>{{$p->datosBasicos->apellidos}}</td>
                    <td>{{$p->datosBasicos->nacionalidad}} - {{$p->datosBasicos->cedula}}</td>

                  </tr>
                  @endforeach
                
              </tbody></table>
            </div>
              </div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

          

          

          

          

        </section>
        <!-- ./col -->
      </div>
	</section>
</div><!-- /.content-wrapper -->
@endsection

