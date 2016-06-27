@extends('layouts.master')

@section('menu')
	@include('teachers._menu')
@stop

@section('content')

	@section('breadcrumb')
		<a href="{{ URL::route('teachers.courses.index', $teacher->id) }}" 
			class="breadcrumb">
			{{ trans('teachers.courses_index_breadcrumb') }}
		</a>

		<a href="{{ URL::route('teachers.courses.show', [$teacher->id, $course->id]) }}" 
			class="breadcrumb">
			{{ $course->name }}
		</a>
	@stop


	<div class="container">
			
		<section class="course">
            <h2>{{$course->name}}</h2>

            <h3>Descripción</h3>
            <p>{{$course->description}}</p>

            <h5>Fecha de inicio</h5>
            <p>{{$course->start_date}}</p>

            <h5>Fecha de finalización</h5>
            <p>{{$course->end_date}}</p>

        </section>

        <section class="course_program">

        	<div class="row">
        		<div class="col">
        			<h3>{{ trans('teachers.section_course_program_title') }}</h3>
        		</div>
        		@if(count($course->modules) < 10)
        		<div class="col">
        			<a href="{{ URL::route('modules.create', [$teacher->id, $course->id] ) }}"
		        		class="waves-effect waves-light btn btn_add">
		                {{ Lang::get('teachers.create_modules_call_to_action') }}
		            </a>
        		</div>
        		@endif
        	</div>
        	        	
        	<ul id="sortable">
	        	@foreach($course->modules as $module)
			        <li>
			            <a href="{{ URL::route('teachers.courses.modules.show', [$teacher->id, $course->id, $module->id]) }}">
			                {{ $module->name }}
			            </a>
			        </li>
			    @endforeach
		    </ul>

		    <p><strong>Nota:</strong> Para cambiar el orden de los modulos haga click sobre el modulo deseado y manteniendo presionado arrastre hacia abajo o hacia arriba a la posición deseada.</p>
        </section>

	</div>
@stop

@section('script')
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	$("#sortable").sortable({
		change: function( event, ui){
			console.log(ui);
		}
	});
	</script>
@stop