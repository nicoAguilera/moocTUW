<!-- Email -->
<div class="input-field">
	{!! Form::label('email', Lang::get('auth.email_label')) !!}
	{!! Form::email('email', old('email'), [
		'class'			=> 'validate',
	]) !!}

	@if ($errors->has('email'))
		<p class="red-text text-darken-2">
			<i class="fa fa-exclamation-circle"></i>
			{{ $errors->first('email') }}
		</p>
	@endif
</div>
<!-- /Email-->

<!-- Password -->
<div class="input-field">
	{!! Form::label('password', Lang::get('auth.password_label')) !!}
	{!! Form::password('password', old('password'), [
		'class'			=> 'validate',
	]) !!}

	@if ($errors->has('password'))
		<p class="red-text text-darken-2">
			<i class="fa fa-exclamation-circle"></i>
			{{ $errors->first('password') }}
		</p>
	@endif
</div>
<!-- /Password -->