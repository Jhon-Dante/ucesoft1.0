@extends('layouts.app')

@section('htmlheader_title')
	Asignaturas
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Asignaturas')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Asignaturas</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
        <section class="content">
			<div class="container spark-screen">
				<div class="row">
            <div class="col-md-12">
                @include('flash::message')
            </div>
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Lista de Asignaturas registradas

								<div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
					                    <a href="{{ url('admin/asignaturas/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
					                        <i class="fa fa-pencil"></i> Registrar asignatura  
					                    </a>
					            </div>

							</div>
             
							<div class="panel-body">
								<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>asignatura</th>
                  <th>Curso</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                	<?php $i=1; ?>
                @foreach($asignaturas as $asignatura)
                <tr>
                  <td><a href="{{ route('admin.asignaturas.edit', [$asignatura->id]) }}">{{$i}}</a></td>
                  <td><a href="{{ route('admin.asignaturas.edit', [$asignatura->id]) }}"> {{$asignatura->asignatura}}</a></td>
                  <td><a href="{{ route('admin.asignaturas.edit', [$asignatura->id]) }}"> {{$asignatura->cursos->curso}}</a></td>
                  <td>
                 
                  <div class="btn-group">
                      <a href="{{ route('admin.asignaturas.edit', [$asignatura->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="{{ route('admin.asignaturas.destroy', [$asignatura->id]) }}"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a><br><br>
                      </div>
                  </td>
                  
                </tr>
               <?php $i++; ?>
                @endforeach
                </tbody>
                
              </table></div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
</div><!-- /.content-wrapper -->
@endsection
