@extends('layouts.app')

@section('htmlheader_title')
	Deducciones
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Deducciones')
        <small>Actualización</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Deducciones</a></li>
        <li class="active">Actualizar</li>
    </ol>
</section>
<!-- Main content -->

        <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Actualización de la Deducción
 				
							</div>

							<div class="panel-body">
								{!! Form::open(['route' => ['admin.deducciones.update',$deduccion->id], 'method' => 'put']) !!}
                
					                 @include('admin.deducciones.partials.edit-fields')
					                <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Enviar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/deducciones')}}"><i class="fa fa-times"></i> Cancelar</a>
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
