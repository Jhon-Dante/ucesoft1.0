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
                
				@foreach($inscripcion as $inscri)
					<td>{{$num=$num+1}}</td>
					<td>{{$inscri->datosBasicos->nombres}}</td>
					<td>{{$inscri->datosBasicos->apellidos}}</td>
					<td>{{$inscri->datosBasicos->nacionalidad}} - {{$inscri->datosBasicos->cedula}}</td>
					<td>{{$inscri->seccion->curso->curso}}</td>
					<td>{{$inscri->seccion->seccion}}</td>
					<td>{{$inscri->periodo->periodo}}</td>
					<td>
						<a href="{{ route('admin.boletin.pdf2', ['id_datosBasicos' => $inscri->datosBasicos->id, 'id_seccion' => $inscri->seccion->id, 'id_periodo' => $inscri->id_periodo]) }}"><button class="btn btn-info btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-file-pdf-o"></i></button></a>
                    </td>
                 
                
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
