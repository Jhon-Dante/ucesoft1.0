<div class="form-group{{ $errors->has('seccion') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
        <label for="nombre">Sección: </label>
        <input type="text" name="seccion" class="form-control" />
        
    </div>
    
<div class="form-group{{ $errors->has('id_curso') ? ' has-error' : '' }}">
		(<span style="color: red;">*</span>)
		{!! Form::label('curso','Cursos/Niveles') !!}
        {!! Form::select('id_curso',$cursos,null,['class' => 'form-control', 'title' => 'seleccione el curso a donde quiere crear la sección']) !!}
</div>


