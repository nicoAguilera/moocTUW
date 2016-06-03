@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="content">
			<div class="title">MOOC</div>
			<div class="quote">{{ Inspiring::quote() }}</div>
		</div>
	</div>
@endsection