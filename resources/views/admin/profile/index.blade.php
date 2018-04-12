@extends('layouts.app')

@section('htmlheader_title')
	Perfil de usuario
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Perfil de usuario')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Perfil de usuario</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">Perfil de usuario

          <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
              
          </div>
        
        </div>
      
		    <div class="col-md-10 col-md-offset-1">
			     @include('flash::message')
    		</div>   
    		<div class="panel-body">
			    <div class="box-body">
				   <div class="panel-body">
              @include('admin.profile.partials.index-fields')
            </div>
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
