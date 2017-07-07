@extends('layouts.app')

@section('htmlheader_title')
	Aulas
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Aulas')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Aulas</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">			
    <div class="row">
	   <div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de Aulas registradas

					<div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
	                    <a href="{{ url('admin/aulas/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
	                        <i class="fa fa-pencil"></i> Registrar Aula  
	                    </a>
		            </div>

				</div>
                <div class="col-xs-12">
                    @include('flash::message')
                </div>
				<div class="panel-body">
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                   <th>Nro</th>
                                   <th>Aula</th>
                                   <th>Creada</th>
                                   <th>Actualizada</th>
                                   <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($aula as $aula)
                                <tr>
                                    <td><a href="{{ route('admin.aulas.edit', [$aula->id]) }}">{{ $num=$num+1 }}</a></td>
                                    <td>{{$aula->nombre}}</td>
                                    <td>{{$aula->created_at}}</td>
                                    <td>{{$aula->updated_at }}</td>
                                    <td style="text-align: center; width: 150px;"><a href="{{ route('admin.aulas.edit', [$aula->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a></td>

                                    <td><a href="#" ><button onclick="codigo({{ $aula->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                    <h4 class="modal-title">ELIMINAR AULA</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta aula en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => ['admin.aulas.destroy', 0133], 'method' => 'DELETE']) !!}
                        {{ csrf_field() }}
                        <input type="hidden" id="codigo" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function codigo(codigo){
            $('#codigo').val(codigo);
        }

    </script>
@endsection
