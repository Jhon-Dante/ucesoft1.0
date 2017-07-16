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
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Horarios - Tarde</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista de cursos registrados
              
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
                    <th>Curso</th>
                    <th>Sección</th>
                    <th>Período</th>
                    <th>Opciones</th>
                  </tr>
                </thead>

                <tbody>
        
                   <tr>
                   <td>1</td>
                   <td>1er grado</td>
                   <td>A</td>
                   <td>2017</td>
                   <td>

                      {!! Form::open(['route' => ['admin.horario_tarde.store'], 'method' => 'post']) !!}
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-flat">
                        <i class="fa fa-pencil"></i> Crear   
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="submit" class="btn btn-danger btn-flat" >
                        <i class="fa fa-file-pdf-o"></i> PDF   
                        </button> 
                      </div>
                    {!! Form::close() !!}

                   </td>
                   </tr>

                   <tr>
                   <td>2</td>
                   <td>1er grado</td>
                   <td>B</td>
                   <td>2017</td>
                   <td>
                   {!! Form::open(['route' => ['admin.horario_tarde.store'], 'method' => 'post']) !!}
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-flat">
                        <i class="fa fa-pencil"></i> Crear   
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="submit" class="btn btn-danger btn-flat" >
                        <i class="fa fa-file-pdf-o"></i> PDF   
                        </button> 
                      </div>
                    {!! Form::close() !!} 

                      <tr>
                   <td>3</td>
                   <td>2do grado</td>
                   <td>A</td>
                   <td>2017</td>
                   <td>
                   
                      {!! Form::open(['route' => ['admin.horario_tarde.store'], 'method' => 'post']) !!}
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-flat">
                        <i class="fa fa-pencil"></i> Crear   
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="submit" class="btn btn-danger btn-flat" >
                        <i class="fa fa-file-pdf-o"></i> PDF   
                        </button> 
                      </div>
                    {!! Form::close() !!}

                   </td>
                   </tr> 

                   <tr>
                   <td>4</td>
                   <td>2do grado</td>
                   <td>B</td>
                   <td>2017</td>
                   <td>
                   
                      {!! Form::open(['route' => ['admin.horario_tarde.store'], 'method' => 'post']) !!}
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-flat">
                        <i class="fa fa-pencil"></i> Crear   
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="submit" class="btn btn-danger btn-flat" >
                        <i class="fa fa-file-pdf-o"></i> PDF   
                        </button> 
                      </div>
                    {!! Form::close() !!}

                   </td>
                   </tr> 

                   </td>
                   </tr> 

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
