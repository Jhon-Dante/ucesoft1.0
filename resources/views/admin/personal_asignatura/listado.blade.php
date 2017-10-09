@extends('layouts.app')

@section('htmlheader_title')
  Carga Académica
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Carga Académica')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Carga Académica de Básica</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">Lista de Carga Académica de Básica Asignadas

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
                    <th>Curso</th>
                    <th>Sección</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($personal as $perso)
                  <?php $cont=0; ?>
                  @foreach($perso->asignacion_a as $key)
                    
                  @if($key->pivot->id_periodo==$periodo->id)
                    
                    @if($perso->id_cargo==4)
                  	@if($cont==0)
                  	<tr>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$perso->id]) }}">{{$num=$num+1}}</a></td>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$perso->id]) }}">{{$perso->nombres}}</a></td>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$perso->id]) }}">{{$perso->apellidos}}</a></td>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$perso->id]) }}">{{$key->cursos->curso}}</a></td>
                    <td><a href="{{ route('admin.personal_asignatura.edit', [$perso->id]) }}">
						      @foreach($key->cursos->seccion as $key2)
                    		@if($key2->id==$key->pivot->id_seccion)
                    		{{$key2->seccion}}
                        <?php $id_seccion=$key->pivot->id_seccion; ?>
							          @endif
                    		
                    	@endforeach
                    </a></td>
                    <td>
                      
                      <a href="#" ><button onclick="asignacion({{$perso->id}},{{$id_seccion}})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>

                  @endif
                  <?php $cont++; ?>
                  @endif
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
                    <h4 class="modal-title">Eliminar Asignación</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta Asignación en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.personal_asignatura.actualizar_asignacion_mg'], 'method' => 'post']) !!}
                        <input type="hidden" id="id_personal" name="id_personal">
                        <input type="hidden" id="id_seccion" name="id_seccion">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function asignacion(id_personal,id_seccion){

            $('#id_personal').val(id_personal);
            $('#id_seccion').val(id_seccion);
        }

    </script>

@endsection
