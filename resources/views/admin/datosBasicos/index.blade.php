@extends('layouts.app')

@section('htmlheader_title')
  Estudiantes Preinscritos 
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Estudiantes Preinscritos')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Estudiantes preinscritos</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">Lista de Estudiantes registrados

          <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/DatosBasicos/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                              <i class="fa fa-pencil"></i> Inscribir   
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
                  <th>¿Repite?</th>
                  <th>¿Materias pendientes?</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach($preinscripcion as $preinscri)
                <tr>
                  <td><a href="{{ route('admin.DatosBasicos.edit', [$preinscri->id]) }}">{{$num=$num+1}}</a></td>
                  <td><a href="{{ route('admin.DatosBasicos.edit', [$preinscri->id]) }}"> {{$preinscri->datosbasicos->nombres}}</a></td>
                  <td><a href="{{ route('admin.DatosBasicos.edit', [$preinscri->id]) }}"> {{$preinscri->datosbasicos->apellidos}}</a></td>
                  <td><a href="{{ route('admin.DatosBasicos.edit', [$preinscri->id]) }}"> {{$preinscri->datosbasicos->cedula}}</a></td>
                  <td><a href="{{ route('admin.DatosBasicos.edit', [$preinscri->id]) }}"> {{$preinscri->repite}}</a></td>
                  <td><a href="{{ route('admin.DatosBasicos.edit', [$preinscri->id]) }}"> {{$preinscri->pendiente}}</a></td>
                  <td>
                 
                  <div class="btn-group">

                      <a href="#"><button onclick="mostrardatos(
                        '{{$preinscri->datosbasicos->nombres}}',
                        '{{$preinscri->datosbasicos->apellidos}}',
                        '{{$preinscri->datosbasicos->nacionalidad}}-{{$preinscri->datosbasicos->cedula}}',
                        '{{$preinscri->datosbasicos->lugar_nac}}',
                        '{{$preinscri->datosbasicos->estado}}',
                        '{{$preinscri->datosbasicos->fecha_nac}}',
                        '{{$preinscri->datosbasicos->edad}}',
                        '{{$preinscri->datosbasicos->sexo}}',
                        '{{$preinscri->datosbasicos->peso}}',
                        '{{$preinscri->datosbasicos->talla}}',
                        '{{$preinscri->datosbasicos->salud}}',
                        '{{$preinscri->datosbasicos->direccion}}',
                        '{{$preinscri->datosbasicos->nombre_p}}',
                        '{{$preinscri->datosbasicos->cedula_p}}',
                        '{{$preinscri->datosbasicos->vive_p}}',
                        '{{$preinscri->datosbasicos->nombre_m}}',
                        '{{$preinscri->datosbasicos->cedula_m}}',
                        '{{$preinscri->datosbasicos->vive_m}}')" 

                        class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>
  

                      <a href="{{ route('admin.DatosBasicos.edit', [$preinscri->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="#"><button onclick="eliminar({{$preinscri->id}})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a><br><br>
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
              <h4 class="modal-title">Eliminar Estudiante</h4>
          </div>
          <div class="modal-body">
              ¿Esta seguro que desea eliminar este estudiante en especifico?...
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

              {!! Form::open(['route' => ['admin.DatosBasicos.destroy',0133], 'method' => 'DELETE']) !!}
                  <input type="text" id="id_datoBasico" name="datoBasico">
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
        <h4 class="modal-title">Datos del estudiante</h4>
      </div>
      <div class="modal-body">               
        <strong>Nombres: </strong>
        <p id="nombres"><span></span></p>
        <br>
        <strong>Apellidos: </strong>
        <p id="apellidos"><span></span></p>
        <br>
        <strong>Cédula: </strong> 
        <p id="cedula"><span></span></p>
        <br>
        <strong>Lugar de Nacimiento: </strong> 
        <p id="lugar_nac"><span></span></p>
        <br>
        <strong>Estado: </strong> 
        <p id="estado"><span></span></p>
        <br>
        <strong>Fecha de Nacimiento: </strong> 
        <p id="fecha_nac"><span></span></p>
        <br>
        <strong>Edad: </strong> 
        <p id="edad"><span></span></p>
        <br>
        <strong>Sexo: </strong> 
        <p id="sexo"><span></span></p>
        <br>
        <strong>Peso: </strong> 
        <p id="peso"><span></span></p>
        <br>
        <strong>Talla: </strong> 
        <p id="talla"><span></span></p>
        <br>
        <strong>Salud: </strong> 
        <p id="salud"><span></span></p>
        <br>
        <strong>Dirección: </strong> 
        <p id="direccion"><span></span></p>
        <br>
        
        <br>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function eliminar(id) {
    $("#id_datoBasico").val(id);
  }

  function mostrardatos(nombres,apellidos,cedula,lugar_nac,estado,fecha_nac,edad,sexo,peso,talla,salud,direccion,nombre_p,cedula_p,vive_p,nombre_m,cedula_m,vive_m)
  {
    $('#nombres').text(nombres);
    $('#apellidos').text(apellidos);
    $('#cedula').text(cedula);
    $('#lugar_nac').text(lugar_nac);
    $('#estado').text(estado);
    $('#fecha_nac').text(fecha_nac);
    $('#edad').text(edad);
    $('#sexo').text(sexo);
    $('#peso').text(peso);
    $('#talla').text(talla);
    $('#salud').text(salud);
    $('#direccion').text(direccion);
    $('#nombre_p').text(nombre_p);
    $('#cedula_p').text(cedula_p);
    $('#vive_p').text(vive_p);
    $('#nombre_m').text(nombre_m);
    $('#cedula_m').text(cedula_m);
    $('#vive_m').text(vive_m);
  }
</script>
@endsection
