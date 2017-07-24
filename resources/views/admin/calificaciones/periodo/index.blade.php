@extends('layouts.app')

@section('htmlheader_title')
	Calificaciones
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Calificaciones')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Calificaciones</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
	<div class="row">
        <div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="box-body">
						 {!! Form::open(['route'] => ['admin.calificaciones.store'], 'method' => 'post','id' => 'form' ]) !!}

                            <div class="form-control">
                                @include('admin.calificaciones.periodo.create-fields')
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                    <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/home')}}"><i class="fa fa-times"></i> Cancelar</a>
                                  </div>
                            </div>

                         {!! Form::close() !!} 
                                }
                    </div>
				</div>
			</div>
		</div>
	</div>
</section>
</div><!-- /.content-wrapper -->

@endsection
