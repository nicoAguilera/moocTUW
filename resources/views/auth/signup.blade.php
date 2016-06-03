@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="card">
				<h2 class="card-header">{{ Lang::get('auth.signup_panel_title') }}</h2>
				<div class="card-block">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							{!! Lang::get('auth.error_message_signup') !!}
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open([
							'url' 		=> URL::route('signup'),
							'method'	=>'post', 
							'class'		=>'form-horizontal', 
							'role'		=>'form'
					]) !!}

						<!-- Name -->
						<div class="md-form">
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

						<!-- Email -->
						<div class="md-form {{ $errors->has('name') ? 'has-error' : '' }}">
							{!! Form::label('email', Lang::get('auth.email_label')) !!}
							{!! Form::email('email', old('email'), [
								'class'			=> 'form-control',
								'maxlength'		=> Config::get('user.email_max_length'),
							]) !!}

							@if ($errors->has('email'))
								<p class="text-danger">
									<i class="fa fa-exclamation-circle"></i>
									{{ $errors->first('email') }}
								</p>
							@endif
						</div>
						<!-- /Email -->

						<!-- Password -->
						<div class="md-form">
							{!! Form::label('password', Lang::get('auth.password_label')) !!}
							{!! Form::password('password', [
								'class'			=> 'form-control',
								'min'			=> Config::get('user.password_min_length'),
								'maxlength'		=> Config::get('user.password_max_length'),
							]) !!}

							@if ($errors->has('password'))
								<p class="text-danger">
									<i class="fa fa-exclamation-circle"></i>
									{{ $errors->first('password') }}
								</p>
							@endif
						</div>
						<!-- /Password -->

						<!-- Password Confirmation -->
						<div class="md-form">
							{!! Form::label('password_confirmation', Lang::get('auth.password_confirmation_label')) !!}
							{!! Form::password('password_confirmation', [
								'class'			=> 'form-control',
								'maxlength'		=> Config::get('user.password_max_length'),
							]) !!}

							@if ($errors->has('password_confirmation'))
								<p class="text-danger">
									<i class="fa fa-exclamation-circle"></i>
									{{ $errors->first('password_confirmation') }}
								</p>
							@endif
						</div>
						<!-- /Password Confirmation -->

						<div class="md-form">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-lg btn-block">
									{{ Lang::get('auth.signup_submit_btn') }}
								</button>
							</div>
						</div>
					{!! Form::close()!!}
				</div>
				<a href="{{ URL::route('login') }}">{{ Lang::get('auth.login_call_to_action') }}</a>
			</div>
		</div>
	</div>
</div>
@endsection
