@extends('layouts.master')

@section('menu')
	@include('admin._menu')
@stop

@section('content')

	@section('breadcrumb')
			<!-- breadcrumb teachers_index -->
			<a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
		        {{ Lang::get('admin.breadcrumb_name') }}
		    </a>

		    <a href="{{ URL::route('admin.teachers.index') }}" class="breadcrumb">
		    	{{ Lang::get('admin.teachers_index_breadcrumb') }}
		    </a>
		    <!-- /breadcrumb teachers_index -->

		    <a href="{{ URL::route('admin.teachers.show') }}" class="breadcrumb">
		    	{{ $teacher->name }}
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