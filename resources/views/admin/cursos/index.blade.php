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
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Cursos</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de Cursos registrados

					<div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/cursos/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Curso  
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
                  <th>Curso</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
            	@foreach($cursos as $curso)
                <tr>
                  <td><a href="{{ route('admin.cursos.edit', [$curso->id]) }}">{{ $num=$num+1 }}</a></td>
                  <td><a href="{{ route('admin.cursos.edit', [$curso->id]) }}"> {{$curso->curso}}</a></td>
                  <td>
                 
                  <div class="btn-group">
                      <a href="{{ route('admin.cursos.edit', [$curso->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="#" ><button onclick="cursos({{ $curso->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
                      <br><br>
                      </div>
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
                    <h4 class="modal-title">Eliminar Curso</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este curso en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.cursos.destroy',1033], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="curso" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function cursos(curso){

            $('#curso').val(curso);
        }

    </script>
@endsection
