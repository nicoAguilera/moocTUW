@extends('layouts.master')

@section('menu')
	@include('admin._menu')
@stop

@section('content')

	@section('breadcrumb')
		<a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
	        {{ Lang::get('admin.panel_admin_breadcrumb') }}
	    </a>

	    <a href="{{ URL::route('admin.teachers.index') }}" class="breadcrumb">
	    	{{ Lang::get('admin.teachers_index_breadcrumb') }}
	    </a>
	@stop

	<section>
		<div class="container">
			<div class="row">
				<div class="col">
					<h3>{{ Lang::get('teachers.index_title') }}</h3>
				</div>
				<div class="col btn_add">
					<a href="{{ URL::route('admin.teachers.create') }}" class="waves-effect waves-light btn">
						{{ Lang::get('teachers.create_call_to_action') }}
					</a>
				</div>
			</div>
			

			<div class="listado_profesores">
				@foreach($teachers as $teacher)
					<div class="row">
						<a href="{{ URL::route('admin.teachers.show', $teacher->id) }}" class="">
							{{$teacher->name}}
						</a>
					</div>
				@endforeach
			</div>

			{!! str_replace('/?', '?', $teachers->render()) !!}
		</div>
	</section>

@stop