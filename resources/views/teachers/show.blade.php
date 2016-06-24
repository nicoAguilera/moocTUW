@extends('layouts.master')

@section('menu')
	@include('teachers._menu')
@stop

@section('content')

	@section('breadcrumb')
		<a href="{{ URL::route('teachers.show', $teacher->id) }}" class="breadcrumb">
			{{ trans('teachers.show_profile_breadcrumb') }}
		</a>
	@stop

	<section>
		<div class="container">
			
			<div class="row">
				<h3>{{ $teacher->name }}</h3>
				<p>{{ $teacher->email }}</p>
			</div>

		</div>
	</section>

@stop