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
        <small>Edición de datos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Estudiantes </a></li>
        <li class="active">Edición de datos</li>
    </ol>
</section>

{!! Form::open(['route' => ['admin.DatosBasicos.actualiza'], 'method' => 'post']) !!}

<div id="inscribir" style="display: block">
	

	<section class="content spark-screen">
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edición de datos del Estudiante  <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.</div>
						<div class="panel-body">
							<input type="hidden" name="id_datosBasicos" value="{{$datosBasicos->id}}">
			                 @include('admin.datosBasicos.partials.edit-fields')
						</div>
				</div>
			</div>
		</div>
	</section>

	
	</section>

	<section class="content spark-screen">
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">Recaudos del estudiante</div>
						<div class="panel-body">
							
			               	@include('admin.datosBasicos.partials.edit-fields-recaudos')
			                <div class="box-footer">
				                <button type="submit" class="btn btn-primary">Enviar</button>
				                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/DatosBasicos')}}"><i class="fa fa-times"></i> Cancelar</a>
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