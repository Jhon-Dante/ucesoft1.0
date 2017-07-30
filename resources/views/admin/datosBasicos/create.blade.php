@extends('layouts.app')

@section('htmlheader_title', 'Estudiantes')

@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Estudiantes')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Estudiantes </a></li>
        <li class="active">Registro</li>
    </ol>
</section>
@include('alerts.requests')
	
<!-- Main content -->
{!! Form::open(['route' => ['admin.DatosBasicos.store'], 'method' => 'post', 'id' => 'inscripcion', 'role' => 'form']) !!}
<section class="content spark-screen">
	<div class="row"> 
		<div class="col-md-12">
	         @include('flash::message')
	    </div>
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">Seleccione al representante  <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.</div>
						<div class="panel-body">
            				@include('admin.datosBasicos.partials.create-fields-representante')
			         	</div>
				</div>
			</div>
	</div>
</section>

<section class="content spark-screen">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">Registro del Estudiante  <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.</div>
					<div class="panel-body">
		                 @include('admin.datosBasicos.partials.create-fields')
					</div>
			</div>
		</div>
	</div>
</section>

<section class="content spark-screen">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">Datos académicos del estudiante  <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios, (SI ES UN NUEVO ESTUDIANTE).</div>
					<div class="panel-body">
						<div class="form-group">
							{!! Form::label('regular','¿Estudiante regular?') !!}
							<input type="checkbox" name="regular" id="regular" checked>	
						</div>
					    @include('admin.datosBasicos.partials.create-fields-academicos')
			    	</div>
			</div>
		</div>
	</div>
</section>

<section class="content spark-screen">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">Recaudos del estudiante</div>
					<div class="panel-body">
						
		               	@include('admin.datosBasicos.partials.create-fields-recaudos')
		                <div class="box-footer">
			                <button type="submit" class="btn btn-primary">Enviar</button>
			                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/cursos')}}"><i class="fa fa-times"></i> Cancelar</a>
		              	</div>
					</div>
			</div>
		</div>
	</div>
</section>

		{!! Form::close() !!} 
</div><!-- /.content-wrapper -->
@endsection

@section('scripts')

	<script type="text/javascript" >
	  
	$(document).ready ( function () {

		$("#regular").change( function () {

			if(!$(this).is(":checked")) 
			{
					$("#plantel").removeAttr('disabled');
					$("#materiap").removeAttr('disabled');
					$("#repite1").removeAttr('disabled');
					$("#repite2").removeAttr('disabled');
				
			} else {

					$("#plantel").prop('disabled', true);
					$("#materiap").prop('disabled', true);
					$("#repite1").prop('disabled', true);
					$("#repite2").prop('disabled', true);
					
			}
		});
	});
	

	/*function desbloquear(){

	  	if (document.form.inscripcion.regular.checked==false) {
	 		document.form.inscripcion.plantel.disabled=false;
	 		document.form.inscripcion.materiap.disabled=false;
	 		document.form.inscripcion.repite.disabled=false;
	 		document.form.inscripcion.asignatura.disabled=false;
	 	} else {
	 		document.form.inscripcion.plantel.disabled=true;
	 		document.form.inscripcion.materiap.disabled=true;
	 		document.form.inscripcion.repite.disabled=true;
	 		document.form.inscripcion.asignatura.disabled=true;
	 	}
	 }*/

	</script>
@endsection