@extends('layouts.app')

@section('htmlheader_title')
	Media General
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Media General')
        <small>Registro de Calificaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Media General</a></li>
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
						<div class="panel-heading">Curso: <strong>{{$seccion->curso->curso}}</strong> - Sección: <strong>{{$seccion->seccion}}</strong></div>						

							<div class="panel-body">
								
                {!! Form::open(['route' => ['admin.educacion_media.store'], 'method' => 'post' ]) !!}
    							
			            @include('admin.educacion_media.partials.create-fields')
			             
			                {!! Form::hidden('lapso',$lapso)  !!}
			            <div class="box-footer">
			                <button type="submit" class="btn btn-primary">Enviar</button>
			                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/educacion_basica')}}"><i class="fa fa-times"></i> Cancelar</a>
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
