@extends('layouts.app')

@section('htmlheader_title')
  Representantes
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!--Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Representantes')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Representantes</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
  <div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">Lista de Representantes registrados

            <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
              <a href="{{ url('admin/representantes/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                  <i class="fa fa-pencil"></i> Registrar representante  
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
                    <th>Parentesco</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($representantes as $representante)
                <tr>
                  <td><a href="{{ route('admin.representantes.edit', [$representante->id] ) }}">{{$num=$num+1}}</a></td>
                  <td><a href="{{ route('admin.representantes.edit', [$representante->id] ) }}"> {{$representante->nombres}}</a></td>
                  <td><a href="{{ route('admin.representantes.edit', [$representante->id] ) }}"> {{$representante->apellidos}}</a></td>
                  <td><a href="{{ route('admin.representantes.edit', [$representante->id] ) }}">{{$representante->nacionalidad}} - {{$representante->cedula}}</a></td>
                  
                 <td><a href="{{ route('admin.representantes.edit', [$representante->parentesco->parentesco] ) }}"> {{$representante->parentesco->parentesco}}</a></td>
                  <td>

                  <div class="btn-group">

                      <a href="#"><button onclick="mostrardatos(
                      '{{$representante->nacionalidad}}-{{$representante->cedula}}',
                      '{{$representante->nombres}}',
                      '{{$representante->apellidos}}',
                      '{{$representante->profesion}}',
                      '{{$representante->parentesco->parentesco}}',
                      '{{$representante->vive_estu}}',
                      '{{$representante->ingreso_apx}} Bs.F.',
                      '{{$representante->n_familia}}',
                      '{{$representante->direccion}}',
                      '{{$representante->codigo_hab}}-{{$representante->telf_hab}}',
                      '{{$representante->lugar_tra}}',
                      '{{$representante->codigo_tra}}-{{$representante->telf_tra}}',
                      '{{$representante->responsable_m}}',
                      '{{$representante->codigo_responsable}}-{{$representante->telf_responsable}}',
                      '{{$representante->codigo_opcional}}-{{$representante->telf_opcional}}',
                      '{{$representante->nombre_opcional}}',
                      '{{$representante->codigo_emergencia}}-{{$representante->telf_emergencia}}')"


                       class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>

                      <a href="{{ route('admin.representantes.edit', [$representante->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="{{ route('admin.representantes.destroy', [$representante->id]) }}"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
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
                    <h4 class="modal-title">Eliminar Estudiante</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este estudiante en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.DatosBasicos.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="text" id="id_representante" name="datoBasico">
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
        <h4 class="modal-title">Datos del representantes</h4>
      </div>
      <div class="modal-body">               
        <strong>Cédula: </strong>
        <p id="cedula"><span></span></p>
        <br>        
        <strong>Nombres: </strong>
        <p id="nombres"><span></span></p>
        <br>
        <strong>Apellidos: </strong>
        <p id="apellidos"><span></span></p>
        <br>
        <strong>Profesión: </strong>
        <p id="profesion"><span></span></p>
        <br>
        <strong>Parentesco: </strong>
        <p id="parentesco"><span></span></p>
        <br>
        <strong>¿Vive con el estudiante? </strong>
        <p id="vive_estu"><span></span></p>
        <br>
        <strong>Ingresos Aproximados: </strong>
        <p id="ingreso_apx"><span></span></p>
        <br>
        <strong>Número de familiares en el hogar: </strong>
        <p id="n_familia"><span></span></p>
        <br>
        <strong>Dirección: </strong>
        <p id="direccion"><span></span></p>
        <br>
        <strong>teléfono de habitación: </strong>
        <p id="telf_hab"><span></span></p>
        <br>
        <strong>Lugar de trabajo: </strong>
        <p id="lugar_tra"><span></span></p>
        <br>
        <strong>Teléfono del trabajo: </strong>
        <p id="telf_tra"><span></span></p>
        <br>
        <strong>Responsable de pagar las mensualidades: </strong>
        <p id="responsable_m"><span></span></p>
        <br>
        <strong>Teléfono del responsable: </strong>
        <p id="telf_responsable"><span></span></p>
        <br>
        <strong>Teléfono opcional: </strong>
        <p id="telf_opcional"><span></span></p>
        <br>
        <strong>Teléfono de emergencia: </strong>
        <p id="telf_emergencia"><span></span></p>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function eliminar(id) 
  {
    $("#id_representante").val(id);
  }
  function mostrardatos(cedula,nombres,apellidos,profesion,parentesco,vive_estu,ingreso_apx,n_familia,direccion,telf_hab,lugar_tra,telf_tra,responsable_m,telf_responsable,telf_opcional,telf_emergencia) 
  {
    $('#cedula').text(cedula);
    $('#nombres').text(nombres);
    $('#apellidos').text(apellidos);
    $('#profesion').text(profesion);
    $('#parentesco').text(parentesco);
    $('#vive_estu').text(vive_estu);
    $('#ingreso_apx').text(ingreso_apx);
    $('#n_familia').text(n_familia);
    $('#direccion').text(direccion);
    $('#telf_hab').text(telf_hab);
    $('#lugar_tra').text(lugar_tra);
    $('#telf_tra').text(telf_tra);
    $('#responsable_m').text(responsable_m);
    $('#telf_responsable').text(telf_responsable);
    $('#telf_opcional').text(telf_opcional);
    $('#telf_emergencia').text(telf_emergencia);
  }
</script>
@endsection
