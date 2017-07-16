@extends('layouts.app')

@section('htmlheader_title')
  Horarios
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Horarios')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Horarios</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen ">
      <div class="row">
        <div class="col-md-12">@include('flash::message')
        </div>
          <div class="col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <table class="table">
                  <tr>
                    <td><strong>Turno: </strong>Mañana</td>
                    <td><STRONG>Curso:</STRONG> 1er grado.</td>
                    <td><strong>Sección: </strong>A</td>
                    <td><strong>Número de bloques: </strong>{!! Form::select('bloque',['1','2','3','4']) !!}</td>
                    <td><strong>Bloque: </strong>{!! Form::select('bloque',['Lunes 7:00 a 7:45','Lunes 7:45 a 7:30','Lunes 8:30 a 9:15']) !!}</td>
                    <td><strong>Asignatura: </strong>
                  <select>
                    
                    </select></td>
                  </tr>
                </table>
              </div>
              <div class="panel-heading">
                <table class="table">
                  <tr>
                    <td>Asignaturas:</td>
                    <td>Horas académicas por agregar al horario</td>
                    <td>Horas agregadas</td>
                  </tr>
                  <tr>
                    <td>Matemáticas</td>
                    <td>8</td>
                    <td>2</td>
                  </tr>
                   <tr>
                    <td>Lengua</td>
                    <td>8</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>Cs. Sociales</td>
                    <td>8</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>Educ. Física</td>
                    <td>8</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>Cs. de la Naturaleza</td>
                    <td>8</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>Educ. Vial</td>
                    <td>8</td>
                    <td>0</td>
                  </tr>
                </table>
          </div>

</section>

<section class="content spark-screen ">
      <div class="row">
          <div class="col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <table class="table table-striped">
                <thead>
                <tr>
                  <th>Hora</th>
                  <th>Lunes</th>
                  <th>Martes</th>
                  <th>Miercoles</th>
                  <th>Jueves</th>
                  <th>Viernes</th>
                </tr>
                <tr>
                	<th>7:00 - 7:45</th>
                	<th><div style="background-color: #61F7FF; border-radius: 20px" align="center">Matemáticas</div></th>
              		<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
              		<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
              		<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
              		<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                </tr>
                <tr>
                	<th>7:45 - 8:30</th>
                	<th><div style="background-color: #61F7FF; border-radius: 20px" align="center">Matemáticas</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                </tr>
                <tr>
                	<th>8:30 - 9:15</th>
                	<th colspan="5" align="center"><strong>Recreo</strong></th>
                </tr>
                <tr>
                	<th>9:15 - 10:00</th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                </tr>
                <tr>
                	<th>10:00 - 10:45</th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                </tr>
                <tr>
                	<th>10:45 - 11:30</th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                	<th><div style="background-color: #87FF8D; border-radius: 20px" align="center">No asignado</div></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                
              </table>
               <div class="box-footer">
               {!! Form::open(['route' => ['admin.horarios.store'], 'method' => 'post']) !!}
					                <button type="submit" class="btn btn-primary">Guardar<a href=""></button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/horarios')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
                                      {!! Form::close() !!} 
            </div>
          </div>
        </div>
      
    </section>
</div><!-- /.content-wrapper -->
@endsection
