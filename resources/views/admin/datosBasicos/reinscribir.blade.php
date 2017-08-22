@extends('layouts.app')

@section('htmlheader_title')
	Estudiante
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Estudiantes')
        <small>Reinscripción</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Estudiantes</a></li>
        <li class="active">Reinscripción</li>
    </ol>
</section>
<!-- Main content -->
	@include('alerts.requests')
<section class="content spark-screen">
	<div class="row">
		<div class="col-md-12">
			@include('flash::message')
	    </div>
	    			<div class="col-xs-8">
						<div class="form-group">
							<a href="{{ url('admin/DatosBasicos/create')}}">
							<button type="button" id="nuevo2" style="display: block; width: 200px;" class="btn btn-block btn-success" >Nuevo Ingreso</button>
							</a>
						</div>
					</div>
					<div class="col-xs-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									@if(count($datosBasicos2->preinscripcion)>0)
										<strong>INSCRIPCIÓN: El estudiante aún se encuentra en preinscripción</strong>
									@else
										<strong>El estudiante ya se encuentra Inscrito en el sistema</strong> - Asignar a un nuevo curso
									@endif
								</div>
								
								
								
								<div class="panel-body">
									{!! Form::open(['route' => ['admin.DatosBasicos.reinscribir'], 'method' => 'post']) !!}
	                
						                 @include('admin.datosBasicos.partials.create-fields-regular')
						                <div class="box-footer">
						                <button type="submit" class="btn btn-primary">Enviar</button>
						                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/datosBasicos')}}"><i class="fa fa-times"></i> Cancelar</a>
						              </div>
						            {!! Form::close() !!} 
	          							<!-- /.form-group -->
								</div>
						</div>
				</div>
	</div>
			
</section>
</div><!-- /.content-wrapper -->
@endsection
