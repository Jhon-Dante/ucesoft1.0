@extends('layouts.app')

@section('htmlheader_title')
  Notas
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Notas')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Notas</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista de Notas de los estudiantes

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-success" >Lapso 3</p>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-primary" >Lapso 2</p>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-warning" >Lapso 1</p>
              </div>

              

              
              

          </div>

          <div class="col-xs-12">
              @include('flash::message')
          </div>
          <div class="panel-body">
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nro</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Curso</th>
                  <th>Sección</th>
                  <th>Período</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
				
				@foreach($datosBasicos as $key)
					@foreach($key->inscripcion as $key2)
            @if($key2->id_periodo == Session::get('periodo'))
  					<tr>
  						
  							<td>{{$num=$num+1}}</td>
  							<td>{{$key2->datosBasicos->nombres}}</td>
  							<td>{{$key2->datosBasicos->apellidos}}</td>
  							<td>{{$key2->datosBasicos->nacionalidad}} - {{$key2->datosBasicos->cedula}}</td>
  							<td>{{$key2->seccion->curso->curso}}</td>
  							<td>{{$key2->seccion->seccion}}</td>
  							<td>{{$key2->periodo->periodo}}</td>
  							<td>
  								@if($key2->seccion->curso->id == 1)
  									<a href="{{route ('admin.calificaciones.pdf2',['id_datosBasicos' => $key2->datosBasicos->id,'id_seccion' => $key2->seccion->id, 'id_periodo' => $key2->id_periodo])}}">
  				                <button class="btn btn-danger btn-flat"><i class="fa fa-file-pdf-o"></i></button>
  								@elseif($key2->seccion->curso->id <= 7)
  									<a href="{{ route('admin.boletin.pdf2', ['id_datosBasicos' => $key2->datosBasicos->id, 'id_seccion' => $key2->seccion->id, 'id_periodo' => $key2->id_periodo]) }}"><button class="btn btn-success btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-file-pdf-o"></i></button></a>
  								@else
  									<a href="{{ route('admin.media_general.pdf2', ['id_datosBasicos' => $key2->datosBasicos->id, 'id_seccion' => $key2->seccion->id, 'id_periodo' => $key2->periodo->id]) }}"><button class="btn btn-info btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-file-pdf-o"></i></button></a>
  								@endif
  		                    </td>
                   		
                   	</tr>
                    @endif
                	@endforeach
            	@endforeach
            	
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div><!-- /.content-wrapper -->




@endsection
