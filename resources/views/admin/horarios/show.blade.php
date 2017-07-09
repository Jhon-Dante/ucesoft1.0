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
      <div class="col-md-12">
           @include('flash::message')
      </div>
            <div class="col-md-12">
                @include('flash::message')
            </div>
          <div class="col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading"> Turno: Mañana, Curso: 1er grado, Sección:A, Periodo: 2017-2018, Asignatura:Matemática

              
              </div>

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
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
              		<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
              		<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
              		<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
              		<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                </tr>
                <tr>
                	<th>7:45 - 8:30</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                </tr>
                <tr>
                	<th>8:30 - 9:15</th>
                	<th colspan="5" align="center">Recreo</th>
                </tr>
                <tr>
                	<th>9:15 - 10:00</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                </tr>
                <tr>
                	<th>10:00 - 10:45</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                </tr>
                <tr>
                	<th>10:45 - 11:30</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                	<th>{!! Form::checkbox('ci_repre',null,['class' => 'form-control']) !!}</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                
              </table>
               <div class="box-footer">
					                <button type="submit" class="btn btn-primary">Guardar</button>
					                <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/horarios')}}"><i class="fa fa-times"></i> Cancelar</a>
					              </div>
            </div>
          </div>
        </div>
      
    </section>
</div><!-- /.content-wrapper -->
@endsection
