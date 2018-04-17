<?php 
use Carbon\Carbon;
?>
  @extends('layouts.app')

@section('htmlheader_title')
  Usuarios
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Usuarios')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista de Usuarios registrados

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <a href="{{ url('admin/Usuarios/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Nuevo   
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
                <th>Usuario</th>
                <th>Email</th>
                <th>Tipo de usuario</th>
                <th>Foto</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->tipo_user}}</td>
                    <td>
                        <div align="center"> <img alt="User Pic"
                        @if($usuario->foto==null)
                            src="{{asset('/img/escudo.png')}}" class="img-circle img-responsive">
                        @else
                            src="{{asset(Auth::user()->photo_route)}}" class="img-circle img-responsive">
                        @endif
                        </div>
                    </td>
                    <td align="center">
                    @if($usuario->status == 1)
                        <a href="{{ route('admin.usuario.status', [$usuario->id]) }}"><img src="../img/iconos/bien.png" style="border-radius: 50px;" width="60px" height="60px">
                        <!-- <a href="#">{{ Form::checkbox('status',1,true)}}</a> -->
                        </a>
                    @else
                        <a href="{{ route('admin.usuario.status', [$usuario->id]) }}"><img src="../img/iconos/mal.png" style="border-radius: 50px;" width="60px" height="60px">
                        </a>
                        <!-- <a href="#">{{ Form::checkbox('status',1,false)}}</a> -->
                    @endif
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
                    <h4 class="modal-title">Eliminar Usuarios</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este Usuarios en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open([ 'method' => 'DELETE']) !!}
                        <input type="hidden" id="Usuarios" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div id="myModal2"  class="modal fade" role="dialog">
  <div class="modal-dialog">
            <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Datos del Usuarios</h4>
      </div>
      <div class="modal-body">               
        <strong>Nombres: </strong>
        <p id="nombres"><span></span></p>
        <br>
        <strong>Apellidos: </strong>
        <p id="apellidos"><span></span></p>
        <br>
        <strong>Cédula: </strong><span></span> 
        <p id="cedula"><span></span></p>
        <br>
        <strong>Fecha de Nacimiento: </strong><span></span> 
        <p id="fecha_nacimiento"><span></span></p>
        <br>
        <strong>Fecha de ingreso: </strong><span></span> 
        <p id="fecha_ingreso"><span></span></p>
        <br>
        <strong>Edad: </strong><span></span> 
        <p id="edad"><span></span></p>
        <br>
        <strong>Estado civil: </strong><span></span> 
        <p id="edo_civil"><span></span></p>
        <br>
        <strong>Direccion: </strong><span></span> 
        <p id="direccion"><span></span></p>
        <br>
        <strong>Genero: </strong><span></span> 
        <p id="genero"><span></span></p>
        <br>
        <strong>Teléfono de habitación: </strong><span></span> 
        <p id="telf_hab"><span></span></p>
        <br>
        <strong>Celular: </strong><span></span> 
        <p id="celular"><span></span></p>
        <br>
        <strong>Correo Eléctrónico: </strong><span></span> 
        <p id="correo"><span></span></p>
        <br>
        <strong>Cargo: </strong><span></span> 
        <p id="cargo"><span></span></p>
        <br>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>


 


</div>

   <script type="text/javascript">

        function eliminar(id){

            $('#Usuarios').val(id);
        }
        function mostrardatos(nombres,apellidos,cedula,fecha_nacimiento,fecha_ingreso,edad,edo_civil,direccion,genero,telf_hab,celular,correo,cargo,edad) 
        {
            $('#nombres').text(nombres);
            $('#apellidos').text(apellidos);
            $('#cedula').text(cedula);
            $('#fecha_nacimiento').text(fecha_nacimiento);
            $('#edad').text(edad);
            $('#fecha_ingreso').text(fecha_ingreso);
            $('#edo_civil').text(edo_civil);
            $('#direccion').text(direccion);
            $('#genero').text(genero);
            $('#telf_hab').text(telf_hab);
            $('#celular').text(celular);
            $('#correo').text(correo);
            $('#cargo').text(cargo);
            $('#edad').text(edad);
        }
    </script>
@endsection
