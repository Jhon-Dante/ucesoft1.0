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

              

              <!-- <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <a href="#" data-toggle="modal" data-target="#myModal3" class="btn btn-warning btn-flat" style="padding: 4px 10px; border-radius: 30px;">
                <i class="fa fa-pencil"></i> Editar permisos de usuarios   
                </a>
              </div> -->

          </div>

          <div class="col-xs-12">
              @include('flash::message')
          </div>
          <div class="panel-body">
            <div class="box-body" style="overflow: scroll;">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nro</th>
                <th>Usuario</th>
                <th>Tipo de usuario</th>
                <th>Pre/registrar estudiante</th>
                <th>Ver listado de estudiantes</th>
                <th>Editar datos de estudiantes</th>
                <th>Eliminar estudiantes</th>
                <th>Generar constancia de estudios</th>
                <th>Generar cestificado de calificaciones</th>
                <th>Generar Título de Bachillere</th>
                <th>Listar Representantes</th>
                <th>Registrar representante</th>
                <th>Editar representante</th>
                <th>Pagar mensualidades</th>
                <th>editar montos</th>
                <th>Editar montos de matrícula</th>
                <th>Editar momentos de preescolar</th>
                <th>Editar calificaciones de básica</th>
                <th>Editar calificaciones de Media General</th>
                <th>Editar Notas finales</th>
                <th>Generar horarios</th>
                <th>Listar Personal</th>
                <th>Registrar personal</th>
                <th>Editar datos de personal</th>
                <th>Asignar carga cadémica</th>
                <th>Asignar profesores guías</th>
                <th>Listar profesores Guías</th>
                <th>Listar usuarios</th>
                <th>Editar datos de usuarios</th>
                <th>Listar asignaturas</th>
                <th>Registrar asignaturas</th>
                <th>Editar asignaturas</th>
                <th>Eliminar asignaturas</th>
                <th>Listar auditoría</th>
                <th>Listar aulas</th>
                <th>Registrar aulas</th>
                <th>Editar aulas</th>
                <th>Eliminar aulas</th>
                <th>Listar cargos</th>
                <th>Registrar cargos</th>
                <th>Editar cargos</th>
                <th>Eliminar Cargos</th>
                <th>Listar Periodos</th>
                <th>Crear Periodos</th>
                <th>Editar periodos</th>
                <th>Eliminar Periodos</th>
                <!-- <th>Activar-desactivar periodos</th> -->
                <th>Restaurar BD</th>
                <th>Listar secciones</th>
                <th>Registrar usuarios</th>
                <th>Editar secciones</th>
                <th>Eliminar Secciones</th>
                
              </tr>
            </thead>
            <tbody>

            @foreach($usuarios as $usuario)
                <tr>
                    
                    
                    
                    <td>{{$num=$num+1}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->tipo_user}}</td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, pre_re]) }}">{{$usuario->pre_re}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_estu]) }}">{{$usuario->list_estu}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_estu]) }}">{{$usuario->edit_estu}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, eli_estu]) }}">{{$usuario->eli_estu}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, const_estu]) }}">{{$usuario->const_estu}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, cer_estu]) }}">{{$usuario->cer_estu}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, titulob_estu]) }}">{{$usuario->titulob_estu}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_repre]) }}">{{$usuario->list_repre}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, create_repre]) }}">{{$usuario->create_repre}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_repre]) }}">{{$usuario->edit_repre}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, pag_mensu]) }}">{{$usuario->pag_mensu}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_montos]) }}">{{$usuario->edit_montos}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_monto_m]) }}">{{$usuario->edit_monto_m}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_cali_pre]) }}">{{$usuario->edit_cali_pre}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_cali_basic]) }}">{{$usuario->edit_cali_basic}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_cali_media]) }}">{{$usuario->edit_cali_media}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_notas_final]) }}">{{$usuario->edit_notas_final}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, gen_horario]) }}">{{$usuario->gen_horario}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_perso]) }}">{{$usuario->list_perso}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, create_perso]) }}">{{$usuario->create_perso}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_perso]) }}">{{$usuario->edit_perso}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, asig_car_aca]) }}">{{$usuario->asig_car_aca}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, asig_guia]) }}">{{$usuario->asig_guia}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_guia]) }}">{{$usuario->list_guia}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_user]) }}">{{$usuario->list_user}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_edit]) }}">{{$usuario->list_edit}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_asig]) }}">{{$usuario->list_asig}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, create_asig]) }}">{{$usuario->create_asig}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_asig]) }}">{{$usuario->edit_asig}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, elim_asig]) }}">{{$usuario->elim_asig}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_auditoria]) }}">{{$usuario->list_auditoria}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_aula]) }}">{{$usuario->list_aula}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, create_aula]) }}">{{$usuario->create_aula}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_aula]) }}">{{$usuario->edit_aula}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, elim_aula]) }}">{{$usuario->elim_aula}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_cargo]) }}">{{$usuario->list_cargo}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, create_cargo]) }}">{{$usuario->create_cargo}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_cargo]) }}">{{$usuario->edit_cargo}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, elim_cargo]) }}">{{$usuario->elim_cargo}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_periodo]) }}">{{$usuario->list_periodo}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, create_periodo]) }}">{{$usuario->create_periodo}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_periodo]) }}">{{$usuario->edit_periodo}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, elim_periodo]) }}">{{$usuario->elim_periodo}}</a></td>
                    <!-- <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, act/desac_periodo]) }}">{{$usuario->act/desac_periodo}}</a></td> -->
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, res_BD]) }}">{{$usuario->res_BD}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, list_seccion]) }}">{{$usuario->list_seccion}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, create_seccion]) }}">{{$usuario->create_seccion}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, edit_seccion]) }}">{{$usuario->edit_seccion}}</a></td>
                    <td><a href="{{ route('admin.usuarios.editP', [$usuario->id, elim_seccion]) }}">{{$usuario->elim_seccion}}</a></td>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    


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

<div id="myModal3" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ingrese la contraseña</h4>
        </div>
        <div class="modal-body">
          <p>Ingrese su contraseña de administrador</p>
        
        {!! Form::open(['route' => ['admin.usuario.editar_per'], 'method' => 'POST']) !!}
          <div class="form-group has-feedback">
            <input type="password" required="required" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Aceptar</button>
          {!! Form::close() !!}
        </div>
         </div>
       </div>
     </div>
   </div>

</div><!-- /.content-wrapper -->

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
