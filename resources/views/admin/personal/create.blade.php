@extends('layouts.app')

@section('htmlheader_title')
	Personal
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Personal')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Personal</a></li>
        <li class="active">Registro</li>
    </ol>
</section>
<!-- Main content -->
{!! Form::open(['route' => ['admin.DatosBasicos.store'], 'method' => 'post', 'name' => 'inscripcion', 'id' => 'inscripcion' ]) !!}
        <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Registro del personal
 				@include('flash::message')
							</div>

							<div class="panel-body">
								
                
					                 @include('admin.personal.partials.create-fields')
					                
					            
          							<!-- /.form-group -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Registro del Representante
 				
							</div>

							<div class="panel-body">
								
					                 @include('admin.personal.partials.create-fields-representantes')
					           
					          
          							<!-- /.form-group -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Recaudos del estudiante 
 				
							</div>

							<div class="panel-body">
								
					                 @include('admin.personal.partials.create-fields-recaudos')
					                <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/cursos')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
					          
          							<!-- /.form-group -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		{!! Form::close() !!} 
</div><!-- /.content-wrapper -->
@endsection
<script type="text/javascript" >
  
    
 function desbloquear(){

 	alert('algo');
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
 }

</script>