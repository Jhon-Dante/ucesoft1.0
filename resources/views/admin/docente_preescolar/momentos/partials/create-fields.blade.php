<table class="table">
	<tr>
		<td>Momento 1</td>
		<td>Momento 2</td>
		<td>Momento 3</td>
	</tr>
	<tr>
		<td><div class="form-group">
	{!! Form::label('momento1','Momento 1') !!}
	{!! Form::textarea('momento1',null,['class' => 'form-control', 'title' => 'Escriba el momento que desea registrar al estudiante','required' => 'required']) !!}
	</div>
</td>
<td><div class="form-group">
	{!! Form::label('momento1','Momento 2') !!}
	{!! Form::textarea('momento1',null,['class' => 'form-control', 'title' => 'Escriba el momento que desea registrar al estudiante','required' => 'required','disabled' => 'disabled']) !!}
	</div>
</td>
<td><div class="form-group">
	{!! Form::label('momento1','Momento 3') !!}
	{!! Form::textarea('momento1',null,['class' => 'form-control', 'title' => 'Escriba el momento que desea registrar al estudiante','required' => 'required', 'disabled' => 'disabled']) !!}
	</div>
</td>
	</tr>

</table>