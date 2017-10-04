@extends('layouts.app')

@section('htmlheader_title')
	Asignar Materias
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Asignar Materias')
        <small>Asignar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Asignar Carga Académica</a></li>
        <li class="active">Asignar</li>
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
							<div class="panel-heading">Asignar materias al personal docente
 				@include('flash::message')
							</div>

							<div class="panel-body">
								
                {!! Form::open(['route' => ['admin.personal_asignatura.store'], 'method' => 'post', 'name' => 'personal_asignatura', 'id' => 'personal_asignatura' ]) !!}
    
					                 @include('admin.personal_asignatura.partials.create-fields')
					                
					            <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/personal_asignatura')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
          							<!-- /.form-group -->
          		{!! Form::close() !!} 
							</div>
						</div>
					</div>
				</div>
			
		</section>



		
</div><!-- /.content-wrapper -->
@endsection
@section('scripts')
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

    $.get("/admin/cursos/"+id+"/buscar",function (data) {
       
    	
       $("#id_seccion").empty();
       $("#id_seccion").append('<option value="" selected disabled> Seleccione la Sección</option>');
        
        if(data.length > 0){

            for (var i = 0; i < data.length ; i++) 
            {  
                $("#id_seccion").removeAttr('disabled');
                $("#id_seccion").append('<option value="'+ data[i].id + '">' + data[i].seccion +'</option>');
                
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