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
        <small>Actualización</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Estudiantes</a></li>
        <li class="active">Actualizar</li>
    </ol>
</section>
<!-- Main content -->
@include('alerts.requests')
        <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Actualización de los datos del estudiante   <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios.
 				
							</div>

							<div class="panel-body">
								{!! Form::open(['route' => ['admin.DatosBasicos.update',$curso->id], 'method' => 'put']) !!}
                
					                 @include('admin.DatosBasicos.partials.edit-fields')
					                <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/DatosBasicos')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
					            {!! Form::close() !!} 
          							<!-- /.form-group -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
</div><!-- /.content-wrapper -->
@endsection
