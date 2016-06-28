@extends('layouts.master')

@section('content')
	<div class="container-fluid">
		<section class="courses">
			<div class="row">
				@foreach($courses as $course)
					<div class="col s12 m6 l4">
						<div class="card">
							<div class="card-content" style="padding-bottom:60px;">
								<h2 class="card-title primary-text">{{$course->name}}</h2>
								<p class="secondary-text" style="padding-bottom:20px;">{{$course->description}}</p>
								<a href="{{ URL::route('courses.show', $course->id) }}" class="btn waves-effect waves-light col s12">Ver curso</a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</section>
	</div>
@endsection