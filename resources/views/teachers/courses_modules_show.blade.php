@extends('layouts.master')

@section('menu')
    @include('teachers._menu')
@stop

@section('content')

    @section('breadcrumb')
        <!-- breadcrumb courses_show -->
        <a href="{{ URL::route('teachers.courses.index', $teacher->id) }}" 
            class="breadcrumb">
            {{ trans('teachers.courses_index_breadcrumb') }}
        </a>

        <a href="{{ URL::route('teachers.courses.show', [$teacher->id, $course->id]) }}" 
            class="breadcrumb">
            {{ $course->name }}
        </a>
        <!-- /breadcrumb courses_show -->

        <a href="" class="breadcrumb">
            {{ $module->name }}
        </a>
    @stop

    <div class="container">
        <section class="module">
            <h3>{{ $module->name }}</h4>

            <a href="{{ URL::route('modules.edit', [$course->id, $module->id]) }}">
                {{ Lang::get('modules.edit_call_to_action') }}
            </a>
        </section>

        <section class="activities">
            <div class="row">
                <div class="col">
                    <h4>{{ trans('modules.show_activities_title') }}</h4>
                </div>

                @if(count($module->activities) < 10)
                    <div class="col">
                        <a href="{{ URL::route('activities.create', [$course->id, $module->id]) }}"
                            class="waves-effect waves-light btn btn_add">
                            {{ trans('teachers.create_activities_call_to_action') }}
                        </a>
                    </div>
                @endif
            </div>

            <ul>
                @foreach($module->activities as $activity)
                    <li>
                        <a href="{{ URL::route('activities.show', [$course->id, $module->id, $activity->id]) }}">
                            {{ $activity->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>

@stop