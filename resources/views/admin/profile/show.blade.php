
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Datos de la asignatura</h4>
      </div>
		@foreach($asignaturas as $asignatura)
         @if($asignatura->id==$a)
              <div class="form-group">
                {!! Form::label('id','id') !!}
                {{$asignatura->id}}
              </div>
              <div class="form-group">
                {!! Form::label('asignatura','Asignatura') !!}
                {{$asignatura->asignatura}}
              </div>
              <div class="form-group">
                {!! Form::label('curso','Curso') !!}
                {{$asignatura->id_curso}}
              </div>
              <div class="form-group">
                {!! Form::label('color','Color') !!}
                {{$asignatura->color}}
              </div>
            @endif
           @endforeach
        <!-- <div class="modal-body"> 
            <input type="text" name="id_asignatura" id="id_asig" disabled="disabled" style="border: 0px; background-color: #FFFFFF"  > 
        </div> -->
        <div class="modal-footer">
        	<a href="{{ route('admin.asignaturas.index')}}">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button></a>
        </div>
    </div>
  </div>
</div>