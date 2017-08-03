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
{{-- div para uscar estudiante para reinscribir --}}
<div id="mostrar2" style="display: block;">
{!! Form::open(['route' => ['admin.DatosBasicos.buscarEstudiante'], 'method' => 'post', 'role' => 'form']) !!}
		    		<div class="col-xs-8">
		    			<div class="form-group">
		    				<select class="form-control select2" id="id_estudiante" title="Seleccione el estudiante a Reinscribir" name="id_estudiante">
		    					@foreach($datosBasicos as $db)
									<option value="{{$db->id}}">{{$db->nacionalidad}}-{{$db->cedula}} {{$db->apellidos}}, {{$db->nombres}}</option>
		    					@endforeach
		    				</select>
		    			</div>
						<div class="form-group">
								<button type="submit" id="regular2" style="display: block; width: 200px;" class="btn btn-block btn-info" >Reinscribir estudiante</button>
								
						</div>
					</div>
				{!! Form::close() !!}

{!! Form::open(['route' => ['admin.DatosBasicos.store'], 'method' => 'post', 'id' => 'inscripcion', 'role' => 'form']) !!}
</div>
<div id="inscribir" style="display: block">
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
</div><!-- fin del div para mostrar el nuevo -->



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
	



		$(document).ready( function(){
			$("#ocultar").on("click", function () {

				if($("#padres").css('display','block')) 
				{
					$("#padres").hide();
					$("#seleccionarpadres").show();
					$("#ocultar").hide();
					$("#mostrar").show();
									
				} 
			});

			$("#mostrar").on("click", function () {

				if($("#seleccionarpadres").css('display','block')) 
				{
					$("#padres").show();
					$("#seleccionarpadres").hide();
					$("#ocultar").show();
					$("#mostrar").hide();
									
				} 
			});
		});

		
	</script>
@endsection