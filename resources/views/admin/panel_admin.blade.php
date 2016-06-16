@extends('layouts.master')

@section('menu')
	@include('admin._menu')
@stop

@section('content')
	<h4>{{ Lang::get('admin.panel_admin_title') }}</h4>
@stop