@extends('forms._form')

@section('breadcrumb')
	<a href="{{ URL::route('courses.index') }}" class="breadcrumb">
		{{ Lang::get('course.breadcrumb_name') }}
	</a>
	<a href="{{ URL::route('courses.show', $course->id) }}" class="breadcrumb">
		{{ $course->name }}
	</a>
	<a href="{{ URL::route('modules.show', [$course->id, $module->id]) }}" class="breadcrumb">
		{{ $module->name }}
	</a>
	<a href="{{ URL::route('activities.show', [$course->id, $module->id, $activity->id]) }}" class="breadcrumb">
		{{ $activity->title }}
	</a>
	<a href="" class="breadcrumb">
		{{ Lang::get('activity.edit_breadcrumb') }}
	</a>
@stop

@section('form_title')
	<h4>{{ Lang::get('activity.edit_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::model($activity, [
			'route' 	=> 	['activities.update', $course->id, $module->id, $activity->id],
			'method'	=>	'patch',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}

		<!-- Título -->
		<div class="input-field">
			{!! Form::label('title', Lang::get('activity.title_label')) !!}
			{!! Form::text('title', old('title'), ['class' => 'validate']) !!}

			@if ($errors->has('title'))
				<p class="red-text text-darken-2">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('title') }}
				</p>
			@endif
		</div>
		<!-- /Título -->

		<!-- Boton de actualizar título de actividad -->
		<button class="btn waves-effect waves-light col s12" type="submit" name="action">
			{{ Lang::get('activity.edit_submit_btn') }}
		</button>
		<!-- /Boton de actualizar título de actividad -->

	{!! Form::close() !!}
@stop