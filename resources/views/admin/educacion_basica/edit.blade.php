@extends('layouts.app')

@section('htmlheader_title')
	Educación Básica
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Educación Básica')
        <small>Mostrar Lapsos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Educación Básica</a></li>
        <li class="active">Notas y lapsos</li>
    </ol>
</section>
<!-- Main content -->
    <section class="content spark-screen">
			<div class="row">
			<div class="col-md-12">
	         @include('flash::message')
	    </div>
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">Calificaciones del estudiante

 								<div class="btn-group">
						           
          						</div>
							</div>

							<div class="panel-body">
								
    							{!! Form::open(['route' => ['admin.actualizarlapso_basica'], 'method' => 'post' ]) !!}

					                 @include('admin.educacion_basica.partials.edit-fields')
					                
					                
					            <div class="box-footer">
					            	<button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/educacion_basica')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
          							<!-- /.form-group -->
          							{!! Form::close() !!}
          												</div>

						</div>
					</div>
				</div>
			
		</section>



		


@endsection
