@extends('layouts.master')

@section('menu')
	@include('teachers._menu')
@stop

@section('content')

	@section('breadcrumb')
		<a href="{{ URL::route('teachers.courses.index', $teacher->id) }}" class="breadcrumb">
			{{ trans('teachers.courses_index_breadcrumb') }}
		</a>
	@stop

	<section>
		<div class="container">
			
			<div class="row">
				<h3>{{ trans('teachers.courses_index_title') }}</h3>
				@if(count($courses) > 0)
					<table class="collection">
						@foreach($courses as $course)
							<tr class="collection-item">
								<td><a href="{{ URL::route('teachers.courses.show', [$teacher->id, $course->id]) }}">
									{{ $course->name }}
								</a></td>
								<td><span class="secondary-text">Inicia: </span>
								{{\Carbon\Carbon::createFromFormat(Config::get('course.date_format'), $course->start_date)->toDateString()}}
								</td>
								@if($course->active === NULL)
									<td>
										@if(count($course->modules) > 0 )
										<button value="{{$course->id}}" id="publish">
											Publicar
										</button>
										@else
										<p>Sin contenido</p>
										@endif
									</td>
								@else
									<td><span class="new badge green">ACTIVO</span></td>
								@endif
							</tr>
						@endforeach
					</table>
				@else
					<p>{{trans('teachers.courses_index_without_courses')}}</p>
				@endif
			</div>

		</div>
	</section>

@stop

@section('script')
<script type="text/javascript">

	$("#publish").click(function (){

		var route		= "{{ URL::route('courses.publish') }}";
		var teacherId	= {{ $teacher->id }};
		var courseId 	= parseInt($("#publish").val());
		var token 		= "{{ csrf_token() }}";

		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'PATCH',
			data: {teacherId: teacherId, courseId: courseId},
			success: function(){
				location.reload();
			}
		});
	});

</script>
@stop