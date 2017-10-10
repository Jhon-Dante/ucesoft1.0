@extends('layouts.app')

@section('htmlheader_title')
	Básica
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Educación Básica')
        <small>Registro de calificaciones</small>
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
							<div class="panel-heading">Curso: <strong>{{$seccion->curso->curso}}</strong> - Sección: <strong>{{$seccion->seccion}}</strong></div>

								<div class="panel-body">
								
                {!! Form::open(['route' => ['admin.educacion_basica.store'], 'method' => 'post' ]) !!}
								
									<input type="hidden" name="id_curso" value="{{$seccion->curso->id}}">
    								@include('admin.educacion_basica.partials.create-fields')
					                
					                {!! Form::hidden('lapso',$lapso)  !!}
			                		{!! Form::hidden('id_curso',$seccion->id_curso)  !!}
					            	<div class="box-footer">
									@if($ins > 0)
					                	<button type="submit" class="btn btn-primary">Enviar</button>
									@endif
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/educacion_basica')}}"><i class="fa fa-times"></i> Cancelar</a></div>
          							<!-- /.form-group -->
          						
          		{!! Form::close() !!} 
							</div>
						</div>
					</div>
				</div>
			
		</section>



		
</div><!-- /.content-wrapper -->
@endsection
