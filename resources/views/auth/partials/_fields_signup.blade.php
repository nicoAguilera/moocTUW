<!-- Name -->
<div class="input-field">
	{!! Form::label('name', Lang::get('auth.name_label')) !!}
	{!! Form::text('name', old('name'), [
		'class'			=> 'form-control',
		'maxlength'		=> Config::get('user.name_max_length'),
	]) !!}

	@if ($errors->has('name'))
		<p class="red-text text-darken-2">
			<i class="fa fa-exclamation-circle"></i>
			{{ $errors->first('name') }}
		</p>
	@endif
</div>
<!-- /Name -->

@include('auth.partials._fields_login')

<!-- Password Confirmation -->
<div class="input-field">
	{!! Form::label('password_confirmation', Lang::get('auth.password_confirmation_label')) !!}
	{!! Form::password('password_confirmation', [
		'class'			=> 'form-control',
		'maxlength'		=> Config::get('user.password_max_length'),
	]) !!}

	@if ($errors->has('password_confirmation'))
		<p class="red-text text-darken-2">
			<i class="fa fa-exclamation-circle"></i>
			{{ $errors->first('password_confirmation') }}
		</p>
	@endif
</div>
<!-- /Password Confirmation -->