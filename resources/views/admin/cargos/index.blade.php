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
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cargos</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
        <section class="content">
			<div class="container spark-screen">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">Lista de Cargos registrados

								<div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
					                    <a href="{{ url('admin/cargos/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
					                        <i class="fa fa-pencil"></i> Registrar Cargo  
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
                  <th>Cargo</th>
                  <th>Tipo Personal</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                	<?php $i=1; ?>
                @foreach($cargos as $cargo)
                <tr>
                  <td><a href="{{ route('admin.cargos.edit', [$cargo->id]) }}">{{$i}}</a></td>
                  <td><a href="{{ route('admin.cargos.edit', [$cargo->id]) }}"> {{$cargo->cargo}}</a></td>
                  <td><a href="{{ route('admin.cargos.edit', [$cargo->id]) }}"> {{$cargo->tipo_personal->tipo}}</a></td>
                  <td>
                 
                  <div class="btn-group">
                      <a href="{{ route('admin.cargos.edit', [$cargo->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="#" ><button onclick="cargos({{ $cargo->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
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
                    <h4 class="modal-title">Eliminar Cargo</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este cargo en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.cargos.destroy',1033], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="cargo" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function cargos(cargo){

            $('#cargo').val(cargo);
        }

    </script>

@endsection
