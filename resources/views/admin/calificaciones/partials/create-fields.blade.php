

<div class="form-group">
        <label for="nombre">Sección: </label>
        <input type="text" name="seccion" class="form-control" required="required" />
        
    </div>
    
<div class="form-group">
		{!! Form::label('curso','Cursos/Niveles') !!}
        {!! Form::select('id_curso',$cursos,null,['class' => 'form-control', 'required' => 'required', 'title' => 'seleccione el curso a donde quiere crear la sección']) !!}

</div>


