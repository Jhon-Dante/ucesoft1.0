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
                <th>Activar-desactivar periodos</th>
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
                    <td>{{$usuario->pre_re}}</td>
                    <td>{{$usuario->list_estu}}</td>
                    <td>{{$usuario->edit_estu}}</td>
                    <td>{{$usuario->eli_estu}}</td>
                    <td>{{$usuario->const_estu}}</td>
                    <td>{{$usuario->cer_estu}}</td>
                    <td>{{$usuario->titulob_estu}}</td>
                    <td>{{$usuario->list_repre}}</td>
                    <td>{{$usuario->create_repre}}</td>
                    <td>{{$usuario->edit_repre}}</td>
                    <td>{{$usuario->pag_mensu}}</td>
                    <td>{{$usuario->edit_montos}}</td>
                    <td>{{$usuario->edit_monto_m}}</td>
                    <td>{{$usuario->edit_cali_pre}}</td>
                    <td>{{$usuario->edit_cali_basic}}</td>
                    <td>{{$usuario->edit_cali_media}}</td>
                    <td>{{$usuario->edit_notas_final}}</td>
                    <td>{{$usuario->gen_horario}}</td>
                    <td>{{$usuario->list_perso}}</td>
                    <td>{{$usuario->create_perso}}</td>
                    <td>{{$usuario->edit_perso}}</td>
                    <td>{{$usuario->asig_car_aca}}</td>
                    <td>{{$usuario->asig_guia}}</td>
                    <td>{{$usuario->list_guia}}</td>
                    <td>{{$usuario->list_user}}</td>
                    <td>{{$usuario->list_edit}}</td>
                    <td>{{$usuario->list_asig}}</td>
                    <td>{{$usuario->create_asig}}</td>
                    <td>{{$usuario->edit_asig}}</td>
                    <td>{{$usuario->elim_asig}}</td>
                    <td>{{$usuario->list_auditoria}}</td>
                    <td>{{$usuario->list_aula}}</td>
                    <td>{{$usuario->create_aula}}</td>
                    <td>{{$usuario->edit_aula}}</td>
                    <td>{{$usuario->elim_aula}}</td>
                    <td>{{$usuario->list_cargo}}</td>
                    <td>{{$usuario->create_cargo}}</td>
                    <td>{{$usuario->edit_cargo}}</td>
                    <td>{{$usuario->elim_cargo}}</td>
                    <td>{{$usuario->list_periodo}}</td>
                    <td>{{$usuario->create_periodo}}</td>
                    <td>{{$usuario->edit_periodo}}</td>
                    <td>{{$usuario->elim_periodo}}</td>
                    <td>{{$usuario->act/desac_periodo}}</td>
                    <td>{{$usuario->res_BD}}</td>
                    <td>{{$usuario->list_seccion}}</td>
                    <td>{{$usuario->create_seccion}}</td>
                    <td>{{$usuario->edit_seccion}}</td>
                    <td>{{$usuario->elim_seccion}}</td>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    


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
