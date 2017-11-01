@extends('layouts.app')

@section('htmlheader_title')
	Educación Básica
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Educación Básica')
        <small>Mostrar Lapsos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Educación Básica</a></li>
        <li class="active">Notas y lapsos</li>
    </ol>
</section>
<!-- Main content -->
    <section class="content spark-screen">
			<div class="row">
			<div class="col-md-12">
	         @include('flash::message')
	    </div>
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">Calificaciones de los estudiantes registrados en la sección

 								<div class="btn-group">
						           
          						</div>
							</div>

							<div class="panel-body">
								
    							
					                 @include('admin.educacion_basica.partials.show-fields')
					                
					                
					            <div class="box-footer">
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/educacion_basica')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
          							<!-- /.form-group -->
          												</div>
						</div>
					</div>
				</div>
			
		</section>



		
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ingrese la contraseña</h4>
        </div>
        <div class="modal-body">
          <p>Ingrese la contraseña del profesor asignado a la sección</p>
        
        {!! Form::open(['route' => ['admin.editarlapso_basica'], 'method' => 'POST']) !!}
          <div class="form-group has-feedback">
            <input type="password" required="required" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Aceptar</button>
            <input type="hidden" name="id_datosBasicos" id="id_datosBasicos">
            <input type="hidden" name="id_seccion" id="id_seccion">
            <input type="hidden" name="id_periodo" id="id_periodo">
          {!! Form::close() !!}
        </div>
         </div>
       </div>
     </div>
   </div>
</div><!-- /.content-wrapper -->

@endsection
<script type="text/javascript">

        function contraseña(id_datosBasicos,id_seccion,id_periodo){

            $('#id_datosBasicos').val(id_datosBasicos);
            $('#id_seccion').val(id_seccion);
            $('#id_periodo').val(id_periodo);
        }
      </script>