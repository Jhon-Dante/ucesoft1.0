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
	
<!-- {{-- div para uscar estudiante para reinscribir --}} -->
<div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Inscribir estudiante Registrado/Preregistrado</h3>

                  <div class="box-tools pull-right">
                    
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
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
									
									
							</div>
						</div>
					
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  
                            <button type="submit" id="regular2" style="display: block; width: 200px;" class="btn btn-block btn-warning" >Reinscribir estudiante</button>
                          
                    {!! Form::close() !!}
                  
                </div>
                <!-- /.box-footer-->
              </div>
	<div id="mostrar2" style="display: block;">
	
<div class="col-xs-8">
<div class="form-group">¿El representante no está registrado?<br><br>
	<a href="#" ><button style="padding: 10px 10px 10px 10px;"  class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede registrar el representante" ><i class="fa fa-user-plus"></i> Registrar Representante</button></a>
                      <br><br>
</div>
</div>
{!! Form::open(['route' => ['admin.DatosBasicos.store'], 'method' => 'post', 'id' => 'inscripcion', 'role' => 'form']) !!}
</div>
<div id="inscribir" style="display: block">
	<section class="content spark-screen">
		<div class="row"> 
			<div class="col-md-12">
		         @include('flash::message')
		    </div>
		    	
				<div class="col-xs-12">
						<div class="form-group">
							{!! Form::label('periodos','Periodo donde se realizará la inscripción: ') !!}
							<strong>{!! $periodo->periodo !!}</strong> Status:<strong>({!! $periodo->status !!})</strong>
							{!! Form::hidden('id_periodo',$periodo->id) !!}								
						</div>
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
					<div class="panel-heading">Datos Personales del Estudiante  <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.</div>
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
					<div class="panel-heading">Datos académicos del estudiante  <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.</div>
						<div class="panel-body">
							
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
					<div class="panel-heading">Recaudos para el registro del estudiante</div>
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

<div id="myModal"  class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar Representante</h4>
                </div>
                <div class="modal-body">
                    Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.
                    {!! Form::open(['route' => ['admin.representantes.store'], 'method' => 'POST']) !!}
 						@include('admin.representantes.partials.create-fields')
                        <input type="hidden" name="desde" value="1">
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
</div>

@endsection

@section('scripts')

	

	<script type="text/javascript" >
	  
	$(document).ready ( function () {

		$("#pendiente").change( function () {

			if($(this).is(":checked")) 
			{
					$("#id_asignatura").removeAttr('disabled');
				
			} else {

					$("#id_asignatura").prop('disabled', true);
					
			}
		});
		$("#repite").change( function () {

			if($(this).is(":checked")) 
			{
					$("#id_asignaturare").removeAttr('disabled');
				
			} else {

					$("#id_asignaturare").prop('disabled', true);
					
			}
		});
	});
	


/* para ocultar y mostrar el formulario de registro de padres o a padres registrados */
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

// para bloquear a los padres seleccionados si los va aregistrar
		$(document).ready( function(){
			$("#cedula_p").on("change", function () {

				if($(this).val().length>0) 
				{
					$("#vive_p").prop('disabled',true);
					$("#padre").prop('disabled',true);
									
				} else{
					$("#vive_p").removeAttr('disabled');
					$("#padre").removeAttr('disabled');
				}
			});

			$("#cedula_m").on("change", function () {

				if($(this).val().length>0) 
				{
					$("#vive_m").prop('disabled',true);
					$("#madre").prop('disabled',true);
									
				} else{
					$("#vive_m").removeAttr('disabled');
					$("#madre").removeAttr('disabled');
				}
			});

		});
	</script>



<script type="text/javascript">


$("#id_personal").on("change", function (event) {
    var id = event.target.value;

    $.get("/admin/personales/"+id+"/buscar",function (data) {
       
    	
       $("#id_curso").empty();
       $("#id_curso").append('<option value="" selected disabled> Seleccione el Curso</option>');
        var contar=0;
        if(data.length > 0){

            for (var i = 0; i < data.length ; i++) 
            {  
                $("#id_curso").removeAttr('disabled');
                $("#id_curso").append('<option value="'+ data[i].id + '">' + data[i].curso +'</option>');
                if(data[i].id==8){
                	contar++;
                }
            }
            
            if (contar>0) { 
            	$("#asignaturas").show(); 
            }else{
            	$("#asignaturas").hide();
            }
        }else{
            
            $("#id_curso").attr('disabled', false);

        }
    });
});

$("#id_curso").on("change", function (event) {
    var id = event.target.value;

    $.get("/admin/cursos/"+id+"/busca",function (data) {
       
    	
       $("#id_asignatura").empty();
       $("#id_asignatura").append('<option value="" selected disabled> Seleccione la asignatura</option>');

       if(data.length > 0){

            for (var i = 0; i < data.length ; i++) 
            {  
                $("#id_asignatura").removeAttr('disabled');
                $("#id_asignatura").append('<option value="'+ data[i].id + '">' + data[i].asignatura +'</option>');
                
            }
            
        }else{
            
            $("#id_seccion").attr('disabled', false);

        }

       $("#id_asignaturare").empty();
       $("#id_asignaturare").append('<option value="" selected disabled> Seleccione la asignatura</option>');
        
        if(data.length > 0){

            for (var i = 0; i < data.length ; i++) 
            {  
                $("#id_asignaturare").removeAttr('disabled');
                $("#id_asignaturare").append('<option value="'+ data[i].id + '">' + data[i].asignatura +'</option>');
                
            }
            
        }else{
            
            $("#id_seccion").attr('disabled', false);

        }
    });

    $.get("/admin/asignaturas/"+id+"/buscar",function (data) {
       
    	
       $("#id_asignatura").empty();
      
        
        if(data.length > 0){

            for (var i = 0; i < data.length ; i++) 
            {  
                $("#id_asignatura").removeAttr('disabled');
                $("#id_asignatura").append('<option value="'+ data[i].id + '">' + data[i].asignatura +'</option>');
                
            }
            
        }else{
            
            $("#id_asignatura").attr('disabled', false);

        }
    });
});
</script>




  
@endsection