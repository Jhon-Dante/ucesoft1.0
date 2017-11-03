  @extends('layouts.app')

@section('htmlheader_title')
  Personal
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Personal')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Personal</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista del Personal registrado

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <a href="{{ url('admin/personal/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
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
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cédula</th>
                <th>Cargo</th>
                <th>Telf. Cel</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach($personal as $perso)
              <tr>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$num=$num+1}}                                </a></td>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso->nombres}}                   </a></td>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso->apellidos}}                 </a></td>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso->nacionalidad}}-{{$perso->cedula}}  </a></td>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso->cargo->cargo}}              </a></td>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso->codigo_cel}} - {{$perso->celular}}</a>
                </td>

               <td>
                <div class="btn-group">

                    <a href="#"><button onclick="mostrardatos(
                    '{{$perso->nombres}}',
                    '{{$perso->apellidos}}',
                    '{{$perso->nacionalidad}}-{{$perso->cedula}}',
                    '{{$perso->fecha_nacimiento}}',
                    '{{$perso->fecha_ingreso}}',
                    '{{$perso->edad}}',
                    '{{$perso->edo_civil}}',
                    '{{$perso->direccion}}',
                    '{{$perso->genero}}',
                    '{{$perso->codigo_hab}}-{{$perso->telf_hab}}',
                    '{{$perso->codigo_cel}}-{{$perso->celular}}',
                    '{{$perso->correo}}',
                    '{{$perso->cargo->cargo}}')" 

                    class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>



                    <a href="{{ route('admin.personal.edit', [$perso->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                    <button onclick="eliminar({{ $perso->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button>
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
                    <h4 class="modal-title">Eliminar Personal</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este personal en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.personal.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="personal" name="id">
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
        <h4 class="modal-title">Datos del personal</h4>
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


  <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            {{$mensajeError}}
        </ul>
    </div>


</div>

   <script type="text/javascript">

        function eliminar(id){

            $('#personal').val(id);
        }
        function mostrardatos(nombres,apellidos,cedula,fecha_nacimiento,fecha_ingreso,edad,edo_civil,direccion,genero,telf_hab,celular,correo,cargo) 
        {
            $('#nombres').text(nombres);
            $('#apellidos').text(apellidos);
            $('#cedula').text(cedula);
            $('#fecha_nacimiento').text(fecha_nacimiento);
            $('#fecha_ingreso').text(fecha_ingreso);
            $('#edad').text(edad);
            $('#edo_civil').text(edo_civil);
            $('#direccion').text(direccion);
            $('#genero').text(genero);
            $('#telf_hab').text(telf_hab);
            $('#celular').text(celular);
            $('#correo').text(correo);
            $('#cargo').text(cargo);
        }
    </script>
@endsection
