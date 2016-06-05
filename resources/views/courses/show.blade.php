@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-content">
            <h4>{{$course->name}}</h1>
            <p>
                <label>{{ Lang::get('course.show_description_label') }} </label>{{$course->description}}<br>
    			<label>{{ Lang::get('course.show_start_date_label') }} </label>{{$course->start_date}}<br>
    			<label>{{ Lang::get('course.show_end_date_label') }} </label>{{$course->end_date}}
    		</p>

            <!-- Modulos -->
            <h5>{{ Lang::get('course.show_modules_title') }}</h5>

            <!-- /Modulos-->
        </div>
        <div class="card-action">
            <a href="{{ URL::route('profesores.create') }}">
                {{ Lang::get('course.create_teacher_call_to_action') }}
            </a>
            <a href="{{ URL::route('cursos.edit', $course->id) }}">
                {{ Lang::get('course.edit_call_to_action') }}
            </a>
        </div>
    </div>

    <a href="{{ URL::route('cursos.create') }}" class="waves-effect waves-light btn">
    	{{ Lang::get('course.create_call_to_action') }}
    </a>
</div>
@stop