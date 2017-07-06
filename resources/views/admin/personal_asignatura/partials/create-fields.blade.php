<div class="form-group">
		{!! Form::label('id_docente','Docente') !!}
        {!! Form::select('id_docente',$personal,null,['class' => 'form-control', 'required' => 'required', 'title' => 'Identifique el docente a asignar la materia']) !!}
</div>
<div class="form-group">
		{!! Form::label('id_asignatura','Asignaturas') !!}
        {!! Form::select('id_asignatura',$asignaturas,null,['class' => 'form-control', 'required' => 'required', 'title' => 'Identifique la asignatura del docente']) !!}
</div>
<div class="form-group">
		{!! Form::label('id_periodo','Periodo') !!}
        {!! Form::select('id_periodo',$periodos,null,['class' => 'form-control', 'required' => 'required', 'title' => 'Identifique el periodo en el que asigna la materia con el docente']) !!}
</div>
<div class="form-group">
		{!! Form::label('id_seccion','Secciones') !!}
        {!! Form::select('id_seccion',$seccion,null,['class' => 'form-control', 'required' => 'required', 'title' => 'Identifique la seccion en la que impartirá clases la materia del docente']) !!}
</div>