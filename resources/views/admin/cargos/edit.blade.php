@extends('layouts.app')

@section('htmlheader_title')
	Cargos
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Cargos')
        <small>Actualización</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cargos</a></li>
        <li class="active">Actualizar</li>
    </ol>
</section>
<!-- Main content -->
	@include('alerts.requests')
<section class="content spark-screen">
	<div class="row">
          <div class="col-md-12">
	         @include('flash::message')
	      </div>
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">Actualización del Cargo  <br> Aviso: Campos con (<span style="color: red;">*</span>) son obligatorios</div>
						<div class="panel-body">
							{!! Form::open(['route' => ['admin.cargos.update',$cargo->id], 'method' => 'put']) !!}
            
				                 @include('admin.cargos.partials.edit-fields')
				                <div class="box-footer">
				                <button type="submit" class="btn btn-primary">Enviar</button>
				                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/cargos')}}"><i class="fa fa-times"></i> Cancelar</a>
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
