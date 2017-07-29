<div class="form-group{{ $errors->has('periodo') ? ' has-error' : '' }}">
	(<span style="color: red;">*</span>)
	{!! Form::label('periodo','Periodo') !!}<br>
	<select name="periodo" id="periodo" class="form-control" title="Seleccione el año de Inicio">
	<?php $ini=date('Y');
		
	 ?>
		@for($i=$ini;$i<2040;$i++)
			<?php $fin=$i+1; ?>	
			<option value="{{$i}} - {{$fin}}" >{{$i}} - {{$fin}}</option>

		@endfor
		
	</select>
</div>