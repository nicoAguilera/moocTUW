@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col s12 m8 l6 offset-m2 offset-l3">
			<div class="card">
				<div class="card-content">
					<h3 class="card-title">{{ Lang::get('course.create_panel_title') }}</h3>
					@if(count($errors)>0)
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					@endif
					<div class="row">
						{!! Form::open([
								'route' 	=> 	'cursos.store',
								'method'	=>	'post',
								'class'		=>	'col s12'
						]) !!}

							<!-- Nombre -->
							<div class="input-field">
								{!! Form::label('name', Lang::get('course.create_name_label')) !!}
								{!! Form::text('name', old('name'), ['class' => 'validate']) !!}
							</div>
							<!-- /Nombre -->

							<!-- Descripción -->
							<div class="input-field">
								{!! Form::label('description', Lang::get('course.create_description_label')) !!}
								{!! Form::text('name', old('description'), ['class' => 'validate']) !!}
							</div>
							<!-- /Descripción -->

							<!-- Fecha de inicio -->
							{!! Form::label('start_date', Lang::get('course.create_start_date_label')) !!}
							<div class="input-field">
								{!! Form::date('start_date') !!}
							</div>
							<!-- /Fecha de inicio -->

							<!-- Fecha de finalización -->
							{!! Form::label('end_date', Lang::get('course.create_end_date_label')) !!}
							<div class="input-field">
								{!! Form::date('end_date') !!}
							</div>
							<!-- /Fecha de finalización -->

							<button class="btn waves-effect waves-light col s12 m4 offset-m8" type="submit" name="action">
								{{ Lang::get('course.create_submit_btn') }}
							</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop