@extends('forms._form')

@section('menu')
	@include('admin._menu')
@stop

@section('breadcrumb')
	<!-- breadcrumb teachers_index -->
	<a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
        {{ Lang::get('admin.breadcrumb_name') }}
    </a>

    <a href="{{ URL::route('admin.teachers.index') }}" class="breadcrumb">
    	{{ Lang::get('admin.teachers_index_breadcrumb') }}
    </a>
    <!-- /breadcrumb teachers_index -->

    <a href="{{ URL::route('admin.teachers.create') }}" class="breadcrumb">
    	{{ Lang::get('admin.teachers_create_breadcrumb') }}
    </a>
@stop

@section('form_title')
	<h4>{{ Lang::get('teachers.create_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::open([
			'url' 		=> 	URL::route('teachers.store'),
			'method'	=>	'post', 
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}
			
		@include('auth.partials._fields_signup')

		<button type="submit" class="btn waves-effect waves-light col s12">
			{{ Lang::get('teachers.create_submit_btn') }}
		</button>
	{!! Form::close()!!}
@stop