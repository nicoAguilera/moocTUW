@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col m8 offset-m2">
			<div class="card">
				<div class="card-content">
				<span class="card-title">{{ Lang::get('auth.login_panel_title') }}</span>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							{!! Lang::get('auth.error_message_signup') !!}
						</div>
					@endif
				<div class="row">
					<div class="col s12">
					{!! Form::open([
							'url' 		=> URL::route('login'),
							'method'	=>'post',
							'role'		=>'form'
					]) !!}
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

						<!-- Remember me -->
						<input type="checkbox" class="filled-in" name="remember_me" id="remember_me" value="true">
						<label for="remember_me">{{ Lang::get('auth.remember_me_label') }}</label><br>
							@if ($errors->has('remember_me'))
								<p class="red-text text-darken-2">
									<i class="fa fa-exclamation-circle"></i>
									{{ $errors->first('remember_me') }}
								</p>
							@endif
						<!-- /Remember me -->

						
							<div class="">
								<button type="submit" class="btn btn-primary col s12 m4 offset-m8">
									{{ Lang::get('auth.login_btn') }}
								</button>

								<!--a class="waves-effect waves-teal btn-flat" href="{{ url('/password/email') }}">Forgot Your Password?</a-->
							</div>
						
					{!! Form::close() !!}
					</div>
					</div>
					<div class="card-action">
						<a href="{{ URL::route('signup') }}">
							{{ Lang::get('auth.signup_call_to_action') }}
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
