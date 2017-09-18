
@if($cali == 0)

	<div class="form-group">
	</div>
		{!! Form::label('juicios','Juicio del 1er lapso') !!}
		{!! Form::textarea('juicios',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh']) !!}

	<div class="form-group">
		{!! Form::label('sugerencias','Sugerencias del 1er lapso') !!}
		{!! Form::text('sugerencias',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh']) !!}
	</div>

	<div class="form-group">
	</div>
		{!! Form::label('juicios','Juicio del 2do lapso') !!}
		{!! Form::textarea('juicios',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh', 'disabled' => 'disabled']) !!}

	<div class="form-group">
		{!! Form::label('sugerencias','Sugerencias del 2do lapso') !!}
		{!! Form::text('sugerencias',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh', 'disabled' => 'disabled']) !!}
	</div>

	<div class="form-group">
	</div>
		{!! Form::label('juicios','Sugerencias del 3er Lapso	') !!}
		{!! Form::textarea('juicios',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh', 'disabled' => 'disabled']) !!}

	<div class="form-group">
		{!! Form::label('sugerencias','Sugerencias del 3er lapso') !!}
		{!! Form::text('sugerencias',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh', 'disabled' => 'disabled']) !!}
	</div>

@elseif($cali >= 1)
	<div class="form-group">
		{!! Form::label('juicios','Juicio del 1er lapso') !!}
		{!! Form::textarea('juicios',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','disabled' => 'disabled']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('sugerencias','Sugerencias del 1er lapso') !!}
		{!! Form::text('sugerencias',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','disabled' => 'disabled']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('juicios','Juicio del 2do lapso') !!}
		{!! Form::textarea('juicios',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('sugerencias','Sugerencias del 2do lapso') !!}
		{!! Form::text('sugerencias',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('juicios','Juicios del 3er Lapso	') !!}
		{!! Form::textarea('juicios',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh', 'disabled' => 'disabled']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('sugerencias','Sugerencias del 3er lapso') !!}
		{!! Form::text('sugerencias',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh', 'disabled' => 'disabled']) !!}
	</div>
@elseif($cali >= 2)

	<div class="form-group">
		{!! Form::label('juicios','Juicio del 1er lapso') !!}
		{!! Form::textarea('juicios',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','disabled' => 'disabled']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('sugerencias','Sugerencias del 1er lapso') !!}
		{!! Form::text('sugerencias',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh','disabled' => 'disabled']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('juicios','Juicio del 2do lapso') !!}
		{!! Form::textarea('juicios',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh', 'disabled' => 'disabled']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('sugerencias','Sugerencias del 2do lapso') !!}
		{!! Form::text('sugerencias',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh', 'disabled' => 'disabled']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('juicios','Sugerencias del 3er Lapso	') !!}
		{!! Form::textarea('juicios',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('sugerencias','Sugerencias del 3er lapso') !!}
		{!! Form::text('sugerencias',null,['class' => 'form-control','placeholder' => 'Ej: Juan José', 'title' => 'Phjgh']) !!}
	</div>
@endif