@extends('layouts.app')

@section('htmlheader_title')
	Cursos
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Cursos')
        <small>Actualización</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cursos</a></li>
        <li class="active">Actualizar</li>
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
							<div class="panel-heading">Actualización del Curso
 				
							</div>

							<div class="panel-body">
								{!! Form::open(['route' => ['admin.personal.update',$personal->id], 'method' => 'put']) !!}
                
					                 @include('admin.personal.partials.edit-fields')
					                <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/cursos')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
					            {!! Form::close() !!} 
          							<!-- /.form-group -->
							</div>
						</div>
					</div>
				</div>
			
		</section>
</div><!-- /.content-wrapper -->
@endsection
