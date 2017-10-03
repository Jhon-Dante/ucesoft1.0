@extends('layouts.app')

@section('htmlheader_title')
	Básica
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Básica')
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Básica</a></li>
        <li class="active">Lapsos</li>
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
							<div class="panel-heading">Lapsos de los estudiante de: <strong>{{$inscripcion2->seccion->curso->curso}}</strong>, de la sección: <strong>{{$inscripcion2->seccion->seccion}}</strong> en el perído: <strong>{{$periodos->periodo}}</strong></div>

								<div class="panel-body">
								
                {!! Form::open(['route' => ['admin.educacion_basica.store'], 'method' => 'post' ]) !!}

    								@include('admin.educacion_basica.partials.create-fields')
					                
					                <input type="hidden" name="id_periodo" value="{{$periodos->id}}">
					                <input type="hidden" name="id_datosBasicos" value="{{$inscripcion2->id}}">
					                 
					                
					                
					            	<div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/preescolar')}}"><i class="fa fa-times"></i> Cancelar</a></div>
          							<!-- /.form-group -->
          						
          		{!! Form::close() !!} 
							</div>
						</div>
					</div>
				</div>
			
		</section>



		
</div><!-- /.content-wrapper -->
@endsection
