@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('ContentTools/content-tools.min.css')}}">
@stop

@section('menu')
	@include('teachers._menu')
@stop

@section('content')
	@section('breadcrumb')
		<!-- breadcrumb courses_modules_activities_show -->
        <a href="{{ URL::route('teachers.courses.index', $teacher->id) }}" 
            class="breadcrumb">
            {{ trans('teachers.courses_index_breadcrumb') }}
        </a>

        <a href="{{ URL::route('teachers.courses.show', [$teacher->id, $course->id]) }}" 
            class="breadcrumb">
            {{ $course->name }}
        </a>

        <a href="{{ URL::route('teachers.courses.modules.show', [$teacher->id, $course->id, $module->id]) }}" class="breadcrumb">
            {{ $module->name }}
        </a>
        
        <a href="{{ URL::route('teachers.courses.modules.activities.show', [$teacher->id, $course->id, $module->id, $activity->id]) }}" class="breadcrumb">
            {{ $activity->title }}
        </a>
        <!-- /breadcrumb courses_modules_activities_show -->

        <a href="" class="breadcrumb">Editor de contenido de actividades</a>
	@stop

	<div class="container">
		<section data-editable data-name="content">

			@include('teachers._template_activity')

		</section>
	</div>
	<meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}" />

	@section('script')
		<script src="{{asset('ContentTools/content-tools.min.js')}}"></script>
		<script>
			window.addEventListener('load', function() {
			    var editor;

			    ContentTools.StylePalette.add([
				    new ContentTools.Style('Author', 'author', ['p'])
				]);

				editor = ContentTools.EditorApp.get();
				editor.init('[data-editable]', 'data-name');

				editor.addEventListener('saved', function (ev) {
				    var name, payload, regions, xhr;

				    // Check that something changed
				    regions = ev.detail().regions;
				    if (Object.keys(regions).length == 0) {
				        return;
				    }

				    // Set the editor as busy while we save our changes
				    this.busy(true);

				    // Collect the contents of each region into a FormData instance
				    payload = new FormData();
				    for (name in regions) {
				        if (regions.hasOwnProperty(name)) {
				            payload.append(name, regions[name]);
				        }
				    }

				    
				    // Send the update content to the server to be saved
				    function onStateChange(ev) {
				        // Check if the request is finished
				        if (ev.target.readyState == 4) {
				            editor.busy(false);
				            if (ev.target.status == '200') {
				                // Save was successful, notify the user with a flash
				                new ContentTools.FlashUI('ok');
				            } else {
				                // Save failed, notify the user with a flash
				                new ContentTools.FlashUI('no');
				            }
				        }
				    };

				    xhr = new XMLHttpRequest();
				    xhr.addEventListener('readystatechange', onStateChange);
				    xhr.open('POST', "{{ URL::route('activities.save.content', $activity->id) }}");
				    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('#csrf-token').getAttribute("content"));
				    xhr.send(payload);
				});

			});
		</script>
	@stop

@stop
