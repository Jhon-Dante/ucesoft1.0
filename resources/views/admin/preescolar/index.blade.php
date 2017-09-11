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
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Preescolar</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista del estudiante de preescolar registrado

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-success" >Momento 3</p>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-primary" >Momento 2</p>
              </div>

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <p style="padding: 4px 10px;" class="btn btn-warning" >Momento 1</p>
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
                <th>Nombre del Estudiante</th>
                <th>Curso</th>
                <th>Sección</th>
                <th>Período</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach($inscripcion as $inscri)
              <tr>
                

               <td><a href="#">{{$num=$num+1}}</a></td>
               <td><a href="#">{{$inscri->inscripcion}}</a></td>
               <td><a href="#">{{$inscri->seccion->curso->curso}}</a></td>
               <td><a href="#">{{$inscri->seccion->seccion}}</a></td>
               <td><a href="#">{{$inscri->periodo->periodo}}</a></td>

               <td>
                <div class="btn-group">
                {!! Form::open(['route' => 'admin.preescolar.create']) !!}
                      
                      {!! Form::text('id',$inscri->id) !!}
                      <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                  {!! Form::close() !!}
                    

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
@endsection
