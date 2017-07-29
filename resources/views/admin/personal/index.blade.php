  @extends('layouts.app')

@section('htmlheader_title')
  Personal
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Personal')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Personal</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
    <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lista del Personal registrado

              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
                <a href="{{ url('admin/personal/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Nuevo   
                </a>
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
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cédula</th>
                <th>Cargo</th>
                <th>Telf. Cel</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach($personal as $perso)
              <tr>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$num=$num+1}}                                </a></td>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso->nombres}}                   </a></td>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso->apellidos}}                 </a></td>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso->nacionalidad}}-{{$perso->cedula}}  </a></td>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso->cargo->cargo}}              </a></td>
                <td><a href="{{ route('admin.personal.edit', [$perso->id]) }}"> {{$perso->codigo_cel}} - {{$perso->celular}}                </a></td>

               <td>
                <div class="btn-group">
                    <a href="{{ route('admin.personal.edit', [$perso->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                    <a href="#"><button onclick="eliminar({{ $perso->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>
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
                    <h4 class="modal-title">Eliminar Personal</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este personal en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.personal.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="personal" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function eliminar(id){

            $('#personal').val(id);
        }

    </script>
@endsection
