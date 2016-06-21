@section('breadcrumb')
	<a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
        {{ Lang::get('admin.breadcrumb_name') }}
    </a>

    @if(Auth::check() && Auth::user()->role === 'admin' && (Route::currentRouteName() === 'teachers.index' || Route::currentRouteName() === 'teachers.create' || Route::currentRouteName() === 'teachers.show' ) )
    	<a href="{{ URL::route('courses.index') }}" class="breadcrumb">
    		{{ Lang::get('courses.index_breadcrumb') }}
    	</a>
    	<a href="{{ URL::route('courses.show', $course->id) }}" class="breadcrumb">
    		{{ $course->name }}
    	</a>
    	<a href="{{ URL::route('teachers.index', $course->id) }}" class="breadcrumb">
            {{ Lang::get('teachers.add_breadcrumb') }}
        </a>
    @endif

    @if(Route::currentRouteName() === 'teachers.create')
        <a href="" class="breadcrumb">{{ Lang::get('teachers.create_breadcrumb') }}</a>
    @endif

    @if(Route::currentRouteName() === 'teachers.show')
        <a href="" class="breadcrumb">{{ $teacher->name }}</a>
    @endif
@stop