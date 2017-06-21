@extends('layouts.app')

@section('htmlheader_title')
	Periodos
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Periodos')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Periodos</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
        <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Lista de Periodos registrados

								<div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
					                    <a href="{{ url('admin/periodos/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
					                        <i class="fa fa-pencil"></i> Registrar Periodo  
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
                  <th>Periodo</th>
                  <th>Status</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                	<?php $i=1; ?>
                 @foreach($periodos as $periodo)
                <tr>
                  <td><a href="{{ route('admin.periodos.edit', [$periodo->id]) }}"> {{$i}}</a></td>
                  <td><a href="{{ route('admin.periodos.edit', [$periodo->id]) }}"> {{$periodo->periodo}}</a></td>
                  <td><a href="{{ route('admin.periodos.edit', [$periodo->id]) }}"> {{$periodo->status}}</a></td>
                  <td>
                 
                  <div class="btn-group">
                      <a href="{{ route('admin.periodos.edit', [$periodo->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      @if($periodo->status !== "Activo")

                      <a href="#" ><button onclick="periodos({{ $periodo->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
                      

                      @endif
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
 <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Eliminar Periodo</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este periodo en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.periodos.destroy',1033], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="periodo" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function perioos(periodo){

            $('#periodo').val(periodo);
        }

    </script>
@endsection
