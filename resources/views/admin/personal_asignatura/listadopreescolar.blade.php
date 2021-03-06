@extends('layouts.app')

@section('htmlheader_title')
  Carga Académica
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Carga Académica de Preescolar')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Carga Académica de Preescolar</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">Lista de Carga Académica de Preescolar Asignadas

          <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/personal_asignatura/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Asignar Carga Académica  
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
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Sección</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($personal as $perso)
                  <?php $cont=0; ?>
                  @foreach($perso->personapsecciones as $key)
                  	@if($key->id_periodo==$periodo->id)
                  	<tr>
	                    <td>{{$num=$num+1}}</td>
	                    <td>{{$perso->nombres}}</td>
	                    <td>{{$perso->apellidos}}</td>
	                    <td>{{$key->secciones->seccion}}</td>
	                    <td>
							
	                    </td>
                    </tr>
                  	@endif
                 @endforeach 
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
                    ¿Esta seguro que desea eliminar este perso en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.personal_asignatura.destroy',1033], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="perso" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function personal_asignatura(perso){

            $('#perso').val(perso);
        }

    </script>
@endsection
