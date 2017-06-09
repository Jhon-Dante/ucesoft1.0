@extends('layouts.app')

@section('htmlheader_title')
	Pago por cesta ticket
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Pago por cesta ticket')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pago por cesta ticket</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
        <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Lista de Pago por cesta ticket registrados

								<div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
					                    <a href="{{ url('admin/pago_x_cestat/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
					                        <i class="fa fa-pencil"></i> Registrar Cesta ticket  
					                    </a>
					            </div>

							</div>
              <div class="col-md-12">
                @include('flash::message')
              </div>
							<div class="panel-body">
								<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Cesta ticket</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                	<?php $i=1; ?>
                 @foreach($pago_x_cestat as $pago_x_c)
                <tr>
                  <td><a href="{{ route('admin.pago_x_cestat.edit', [$pago_x_c->id]) }}"> {{$i}}</a></td>
                  <td><a href="{{ route('admin.pago_x_cestat.edit', [$pago_x_c->id]) }}"> {{$pago_x_c->valor}}</a></td>
                  <td>
                 
                  <div class="btn-group">
                      <a href="{{ route('admin.pago_x_cestat.edit', [$pago_x_c->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="{{ route('admin.pago_x_cestat.destroy', [$pago_x_c->id]) }}"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>

                      <br><br>
                      </div>
                  </td>
                  
                </tr>
               <?php $i++; ?>
                @endforeach
                </tbody>
                
              </table></div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
</div><!-- /.content-wrapper -->
@endsection
