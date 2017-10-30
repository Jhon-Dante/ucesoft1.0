@extends('layouts.app')

@section('htmlheader_title')
	Estudiantes
@endsection
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

!! Form::open(['route' => ['admin.DatosBasicos.store'], 'method' => 'post', 'id' => 'inscripcion', 'role' => 'form']) !!}

<div id="inscribir" style="display: block">
	<section class="content spark-screen">
		<div class="row"> 
			<div class="col-md-12">
		         @include('flash::message')
		    </div>
		    		<div class="col-xs-8">
						<div class="form-group">
								<button type="button" id="regular2" style="display: block; width: 200px;" class="btn btn-block btn-info" >Reinscribir estudiante</button>
								
						</div>
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


<div id="reinscribir" style="display: none">
	<section class="content spark-screen">
			<div class="row"> 
				<div class="col-md-12">
			         @include('flash::message')
			    </div>
			    		<div class="col-xs-8">
							<div class="form-group">
								<button type="button" id="nuevo2" style="display: none; width: 200px;" class="btn btn-block btn-success" >Nuevo Ingreso</button>
									
							</div>
						</div>
					<div class="col-xs-12">
						
						<div class="panel panel-default">
							<div class="panel-heading">Seleccione al representante  <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.</div>
								<div class="panel-body">
		            				@include('admin.datosBasicos.partials.create-fields-regular')
					         	</div>
						</div>
					</div>
			</div>
	</section>
</div>

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

		$(document).ready( function(){

			$("#regular2").on("click", function () {

				if ($("#inscribir").css('display','block'))
				{
					$("#inscribir").hide();
					$("#reinscribir").show();	
					$("#regular2").hide();
					$("#nuevo2").show();
				}
			});

			$("#nuevo2").on("click", function() {

				if ($("#inscribir").css('display','none')) 
				{
					$("#reinscribir").hide();
					$("#inscribir").show();
					$("#regular2").show();
					$("#nuevo2").hide();
				}

			});
		});
	</script>
@endsection