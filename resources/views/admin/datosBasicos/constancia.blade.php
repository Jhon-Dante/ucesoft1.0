@extends('layouts.app')

@section('htmlheader_title')
  Estudiantes Inscritos 
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Estudiantes Inscritos')
        <small>Generar constancia de estudios</small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Estudiantes inscritos</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="callout callout-success">
	        <h4>Aviso</h4>

	        <p>Solo se mostrarán los estudiantes inscritos en el período en curso.</p>
	      </div>


	<div class="box box-warning direct-chat direct-chat-warning">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Seleccione el estudiante registrado en el período activo</h3>

	                  <div class="box-tools pull-right">
	                    
	                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                    </button>
	                    
	                  </div>
	                </div>
	                <!-- /.box-header -->
	                <div class="box-body">
	                  <!-- Conversations are loaded here -->
	                  {!! Form::open(['route' => ['admin.mostrarConstancia'], 'method' => 'post', 'role' => 'form']) !!}
				    		<div class="col-xs-12">
				    			<div class="form-group">
				    				<br>
				    				<select class="form-control select2" id="id_estudiante" title="Seleccione el estudiante a Reinscribir" name="id_estudiante" align="">
				    					@foreach($inscripcion as $db)
											<option value="{{$db->id}}">{{$db->datosBasicos->nacionalidad}}-{{$db->datosBasicos->cedula}} {{$db->datosBasicos->apellidos}}, {{$db->datosBasicos->nombres}} Inscrito en: <strong>{{$db->seccion->curso->curso}}-{{$db->seccion->seccion}}</strong></option>
				    					@endforeach
				    				</select>
				    			</div>
								<div class="form-group">
										
										
								</div>
							</div>
						
	                </div>
	                <!-- /.box-body -->
	                <div class="box-footer">
	                  
	                            <button type="submit" id="regular2" style="display: block; width: 200px;" class="btn btn-block btn-warning" >Aceptar</button>
	                          
	                    {!! Form::close() !!}
	                  
	                </div>
	                <!-- /.box-footer-->
	              </div></div>
@endsection
