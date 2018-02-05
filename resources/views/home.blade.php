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
<div class="col-xs-12">
          @include('flash::message')
          </div>
    @if(Auth::user()->tipo_user == 'Representante')

    
        <section class="content">
        <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
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
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{count($datosBasicos)}}<!-- <sup style="font-size: 20px">%</sup> --></h3>

                  <p>Estudiantes representados en total</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
           
            <!-- ./col -->
            

      <hr>
        
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">

                  <li><a href="#sales-chart" data-toggle="tab">Estudiantes</a></li>
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Estudiantes</li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <div class="box">
                
                <!-- /.box-header -->
                
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
                    
                    @foreach($datosBasicos as $p)
                      <tr>
                        <td>{{$num=$num+1}}.-</td>
                        <td>{{$p->nombres}}</td>
                        <td>{{$p->apellidos}}</td>
                        <td>{{$p->nacionalidad}} - {{$p->cedula}}</td>

                      </tr>
                    @endforeach
                    
                  </tbody></table>
                </div>
                  </div>
                </div>
              </div>
              <!-- /.nav-tabs-custom -->

          

          

          

          

    @elseif(Auth::user()->tipo_user == 'Administrador(a)')
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
                      <th>Curso Anterior</th>
                      <th style="width: 40px"></th>
                    </tr>
                    
                      @foreach($preinscripcion as $p)
                      <tr>
                        <td>{{$num=$num+1}}.-</td>
                        <td>{{$p->datosBasicos->nombres}}</td>
                        <td>{{$p->datosBasicos->apellidos}}</td>
                        <td>{{$p->datosBasicos->nacionalidad}} - {{$p->datosBasicos->cedula}}</td>
                        <td>{{$p->cursos->curso}}</td>

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
                      <th>Curso</th>
                    </tr>
                    
                      @foreach($inscripcion as $p)
                      <tr>
                        <td>{{$num=$num+1}}.-</td>
                        <td>{{$p->datosBasicos->nombres}}</td>
                        <td>{{$p->datosBasicos->apellidos}}</td>
                        <td>{{$p->datosBasicos->nacionalidad}} - {{$p->datosBasicos->cedula}}</td>
                        <td>{{$p->seccion->curso->curso}} {{$p->seccion->seccion}}</td>


                      </tr>
                      @endforeach
                    
                  </tbody></table>
                </div>
                  </div>
                </div>
              </div>
              <!-- /.nav-tabs-custom -->
          

        </section>
        @endif
        <!-- ./col -->
      </div>
	</section>
</div><!-- /.content-wrapper -->
@endsection

<script type="text/javascript">
  function ventanachat() {
    var xmlHttp;
    if (window.XMLHttpRequest)
      {
        xmlHttp=new XMLHttpRequest();
      }
      else
      {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      var fetch_unix_timestamp ="";
        fetch_unix_timestamp = function()
        {
          return parseInt(new Date().getTime().toString().substring(0,10));
        }
      var timestamp = fetch_unix_timestamp();
      xmlHttp.onreadystatechange=function(){
        if(xmlHttp.readyState==4){
          document.getElemById("ventanachat").innerHTML=xmlHttp.responseText;
            setTimeout('ventanachat()',1000);
        }
      }
      xmlHttp.open("GET","db.php"+"?t="+timestamp,true);
      xmlHttp.send(null);
  }
  window.onload =function startrefresh(){
    setTimeout('ventanachat()',1000);
  }
</script>