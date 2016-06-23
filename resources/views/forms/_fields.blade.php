<!-- Nombre -->
<div class="input-field">
	{!! Form::label('name', Lang::get('courses.create_name_label')) !!}
	{!! Form::text('name', old('name'), ['class' => 'validate']) !!}

	@if ($errors->has('name'))
		<p class="red-text text-darken-2">
			<i class="fa fa-exclamation-circle"></i>
			{{ $errors->first('name') }}
		</p>
	@endif
</div>
<!-- /Nombre -->

<!-- Descripción -->
<div class="input-field">
	{!! Form::label('description', Lang::get('courses.create_description_label')) !!}
	{!! Form::text('description', old('description')) !!}

	@if ($errors->has('description'))
		<p class="red-text text-darken-2">
			<i class="fa fa-exclamation-circle"></i>
			{{ $errors->first('description') }}
		</p>
	@endif
</div>
<!-- /Descripción -->

<!-- Fecha de inicio -->
{!! Form::label('start_date', Lang::get('courses.create_start_date_label')) !!}
<div class="input-field">
	{!! Form::text('start_date', old('start_date'), ['placeholder' => Config::get('course.default_date')] ) !!}

	@if ($errors->has('start_date'))
		<p class="red-text text-darken-2">
			<i class="fa fa-exclamation-circle"></i>
			{{ $errors->first('start_date') }}
		</p>
	@endif
</div>
<!-- /Fecha de inicio -->

<!-- Fecha de finalización -->
{!! Form::label('end_date', Lang::get('courses.create_end_date_label')) !!}
<div class="input-field">
	{!! Form::text('end_date', old('end_date'), ['placeholder' => Config::get('course.default_date')] ) !!}

	@if ($errors->has('end_date'))
		<p class="red-text text-darken-2">
			<i class="fa fa-exclamation-circle"></i>
			{{ $errors->first('end_date') }}
		</p>
	@endif
</div>
<!-- /Fecha de finalización -->