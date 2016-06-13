@extends('errors.main')

@section('error_description')
	{{ Lang::get('http_error.503_description') }}
@stop