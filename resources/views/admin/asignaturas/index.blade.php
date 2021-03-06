@extends('layouts.app')

@section('htmlheader_title')
	Asignaturas
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Asignaturas')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Asignaturas</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">Lista de Asignaturas registradas

          <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
              <a href="{{ url('admin/asignaturas/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                  <i class="fa fa-pencil"></i> Registrar asignatura  
              </a>
          </div>
        
        </div>
      
		    <div class="col-md-10 col-md-offset-1">
			     @include('flash::message')
    		</div>   
    		<div class="panel-body">
			    <div class="box-body">
				    <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nro</th>
                <th>asignatura</th>
                <th>Curso</th>
                <th>Nro. Bloques</th>
                <th>Color</th>
                <th>Status</th>
                <th>Opciones</th>
              </tr>
            </thead>
          <tbody>
          @foreach($asignaturas as $asignatura)
            <tr>
              <td><a href="{{ route('admin.asignaturas.edit', [$asignatura->id]) }}">{{$num=$num+1}}</a></td>

              <td><a href="{{ route('admin.asignaturas.edit', [$asignatura->id]) }}"> {{$asignatura->asignatura}}</a></td>

              <td><a href="{{ route('admin.asignaturas.edit', [$asignatura->id]) }}"> {{$asignatura->cursos->curso}}</a></td>
              <td><a href="{{ route('admin.asignaturas.edit', [$asignatura->id]) }}">{{$asignatura->n_bloques}}</a></td>
              <td style="background-color: {{$asignatura->color}}" ></td>
              <td align="center">
              @if($asignatura->status == 1)
                        <a href="{{ route('admin.asignatura.status', [$asignatura->id]) }}"><img src="../img/iconos/bien.png" style="border-radius: 50px;" width="60px" height="60px">
                        <!-- <a href="#">{{ Form::checkbox('status',1,true)}}</a> -->
                        </a>
                    @else
                        <a href="{{ route('admin.asignatura.status', [$asignatura->id]) }}"><img src="../img/iconos/mal.png" style="border-radius: 50px;" width="60px" height="60px">
                        </a>
                        <!-- <a href="#">{{ Form::checkbox('status',1,false)}}</a> -->
                    @endif
              </td>
              <td>                   
                    <div class="btn-group">

                        <a href="#"><button onclick="mostrardatos('{{$asignatura->asignatura}}','{{$asignatura->cursos->curso}}')" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver el registro" ><i class="fa fa-eye"></i></button></a>  

                        <a href="{{ route('admin.asignaturas.edit', [$asignatura->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                        <a href="#" ><button onclick="asignatura({{ $asignatura->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
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
          <h4 class="modal-title">Eliminar Asignatura</h4>
        </div>
        <div class="modal-body">
          ¿Esta seguro que desea eliminar esta asignatura en especifico?...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

          {!! Form::open(['route' => ['admin.asignaturas.destroy',1033], 'method' => 'DELETE']) !!}
            <input type="hidden" id="asignatura" name="id">
            <button type="submit" class="btn btn-primary">Aceptar</button>
          {!! Form::close() !!}

         </div>
       </div>
     </div>
   </div>



   <script type="text/javascript">

        function asignatura(asignatura){

            $('#asignatura').val(asignatura);
        }

    </script>

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Datos de la asignatura</h4>
      </div>
        <div class="modal-body"> 
            <label><strong>Asignatura: </strong></label><p id="asignaturas"><span></span></p>
            <label><strong>Curso: </strong></label><p id="curso"><span></span></p>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
   function mostrardatos(asignatura,curso)
    {
      
        $('#asignaturas').text(asignatura);
        $('#curso').text(curso);
    }
</script>
@endsection
