
	<div class="col-xs-4">
		<div class="form-group">
			{!! Form::label('part_nac','Partida de Nacimiento') !!}
			{!! Form::checkbox('part_nac','Si',['title' => 'Seleccione si entregó la partida de Nacimiento']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('boleta_v','Boleta de vacuna') !!}
			{!! Form::checkbox('boleta_v','Si',['title' => 'Seleccione si entregó la Boleta de Vacuna']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('ci','Copia de Cédula del estudiante') !!}
			{!! Form::checkbox('nombre','Si',['title' => 'Seleccione si entregó la copia de la cédula del estudiante']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('fotos','Fotos') !!}
			{!! Form::checkbox('fotos','Si',['title' => 'Seleccione si entregó las Fotos']) !!}
		</div>		
	</div>


	<div class="col-xs-4">

		<div class="form-group">
			{!! Form::label('ci_repre','Copia de Cédula del representante') !!}
			{!! Form::checkbox('ci_repre','Si',['title' => 'Seleccione si entregó la Copia de la Cédula del Representante']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('foto_repre','Fotos del representante') !!}
			{!! Form::checkbox('foto_repre','Si',['title' => 'Seleccione si entregó las Fotos del representante']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('cer_promo','Certificado de promoción') !!}
			{!! Form::checkbox('cer_promo','Si',['title' => 'Seleccione si entregó el Certificado de promoción']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('cer_calif','Certificado de calificaciones') !!}
			{!! Form::checkbox('cer_calif','Si',['title' => 'Seleccione si entregó el Certificado de calificaciones']) !!}
		</div>
	</div>

	<div class="col-xs-4">
		<div class="form-group">
			{!! Form::label('solv_a','Solvencia administrativa') !!}
			{!! Form::checkbox('solv_a','Si',['title' => 'Seleccione si entregó la Solvencia administrativa']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('tim_fis','Timbres fiscales') !!}
			{!! Form::checkbox('tim_fis','Si',['title' => 'Seleccione si entregó los Timbres fiscales']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('const_tra','Constancia de Trabajo') !!}
			{!! Form::checkbox('const_tra','Si',['title' => 'Seleccione si entregó la Constancia de Trabajo']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('carpeta_m','Carpeta Manila Oficio') !!}
			{!! Form::checkbox('carpeta_m','Si',['title' => 'Seleccione si entregó la Carpeta Manila Oficio']) !!}
		</div>
	</div>



