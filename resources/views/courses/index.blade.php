@extends('layouts.master')

@section('menu')
	@include('admin._menu')
@stop

@section('content')

	@section('breadcrumb')
		<a href="" class="breadcrumb">
	        {{ Lang::get('course.breadcrumb_name') }}
	    </a>
	@stop

	<div class="container-fluid">
		<div class="row">
			<div class="card col s12 l10 offset-l1">
				<div class="card-content">
					<h3>{{ Lang::get('course.index_panel_title') }}</h3>

					<div class="collection">
						@foreach($courses as $course)
							@if($course->active === NULL)
							<a href="{{ URL::route('courses.show', $course['id']) }}" class="collection-item">
								<span class="secondary-text">{{$course->name}}</span>
								<span class="new badge red darken-2">INACTIVO</span>
							</a>
							@else
							<a href="{{ URL::route('courses.show', $course['id']) }}" class="collection-item green-text">
								<span class="primary-text">{{$course->name}}</span>
								<span class="secondary-text">Inicia: </span>{{$course->start_date}}
								<span class="secondary-text">Finaliza: </span>{{$course->end_date}}
								<span class="new badge green">ACTIVO</span>
							</a>
							@endif
						@endforeach
					</div>

					<a href="{{ URL::route('courses.create') }}">{{ Lang::get('course.create_call_to_action') }}</a>
				</div>
			</div>
		</div>
	</div>
@stop