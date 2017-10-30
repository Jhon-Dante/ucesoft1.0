@extends('layouts.app')

@section('htmlheader_title')
	Preescolar
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Preescolar')
        <small>Mostrar momentos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Preescolar</a></li>
        <li class="active">Juicios y sugerencias Registradas</li>
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
							<div class="panel-heading">Juicios y sugerencias del estudiante Registrados

 								<div class="btn-group">
						            <a href="{{ route('admin.calificaciones.pdf',['id_seccion' => $seccion->id, 'id_periodo' => $periodos->id]) }}" class="btn btn-warning btn-flat" style="padding: 4px 10px;">
						                <i class="fa fa-pencil"></i> Descargar PDF 
						            </a>
          						</div>
							</div>

							<div class="panel-body">
								
    							
					                 @include('admin.preescolar.partials.show-fields')
					                
					                
					            <div class="box-footer">
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/preescolar')}}"><i class="fa fa-times"></i> Cancelar</a>
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
        
        {!! Form::open(['route' => ['admin.editarmomento'], 'method' => 'POST']) !!}
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
