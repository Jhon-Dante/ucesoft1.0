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
        <li><a href="#"><i class="fa fa-dashboard"></i> Estudiantes</a></li>
        <li class="active">Registro</li>
    </ol>
</section>
<!-- Main content -->
{!! Form::open(['route' => ['admin.DatosBasicos.store'], 'method' => 'post']) !!}
        <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Registro del Estudiante
 				@include('flash::message')
							</div>

							<div class="panel-body">
								
                
					                 @include('admin.datosBasicos.partials.create-fields')
					                
					            
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
							<div class="panel-heading">Datos académicos del estudiante
 				
							</div>

							<div class="panel-body">
								
					                 @include('admin.datosBasicos.partials.create-fields-academicos')
					                
					          
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
								
					                 @include('admin.datosBasicos.partials.create-fields')
					           
					          
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
								
					                 @include('admin.datosBasicos.partials.create-fields')
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
  $(document).ready(function(){
  		$('#cedulaP').onchange(function(){
  			alert($(this).text());

  		});

  });
    


</script>