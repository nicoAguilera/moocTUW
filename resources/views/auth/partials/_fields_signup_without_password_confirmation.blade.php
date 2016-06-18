<!-- Name -->
<div class="input-field">
	{!! Form::label('name', Lang::get('auth.name_label')) !!}
	{!! Form::text('name', old('name'), [
		'class'			=> 'form-control',
		'maxlength'		=> Config::get('user.name_max_length'),
	]) !!}

	@if ($errors->has('name'))
		<p class="text-danger">
			<i class="fa fa-exclamation-circle"></i>
			{{ $errors->first('name') }}
		</p>
	@endif
</div>
<!-- /Name -->

@include('auth.partials._fields_login')