@extends('layouts.app')

@section('htmlheader_title')
	Educación Media General
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Educación Media General')
        <small>Mostrar Lapsos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Educación Media General</a></li>
        <li class="active">Notas y lapsos</li>
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
							<div class="panel-heading">Juicios y sugerencias de los estudiantes registrados

 								<!-- <div class="btn-group">
						            <a href="{{ route('admin.calificaciones.pdf',['id_seccion' => $seccion->id, 'id_periodo' => $periodo->id]) }}" class="btn btn-warning btn-flat" style="padding: 4px 10px;">
						                <i class="fa fa-pencil"></i> Descargar PDF 
						            </a>
          						</div> -->
							</div>

							<div class="panel-body">
								
    							
					                 @include('admin.educacion_media.partials.show-fields')
					                
					                
					            <div class="box-footer">
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/educacion_media')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
          							<!-- /.form-group -->
          												</div>
						</div>
					</div>
				</div>
			
		</section>



		
</div><!-- /.content-wrapper -->
@endsection
