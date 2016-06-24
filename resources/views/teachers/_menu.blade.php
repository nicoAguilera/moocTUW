<!-- Perfil -->
@if(Route::currentRouteName() === 'teachers.show')
	<li class="bold indigo">
		<a href="{{ URL::route('teachers.show', $teacher->id) }}" 
			class="waves-effect waves-teal white-text">
@else
	<li class="bold">
		<a href="{{ URL::route('teachers.show', $teacher->id) }}" 
			class="waves-effect waves-teal">
@endif
		{{ Lang::get('teachers.item_menu_profile') }}
	</a>
</li>
<!-- /Perfil -->

<!-- Cursos -->
@if(Route::currentRouteName() === 'teachers.courses.index')
	<li class="bold indigo">
		<a href="{{ URL::route('teachers.courses.index', $teacher->id) }}" 
			class="waves-effect waves-teal white-text">
@else
	<li class="bold">
		<a href="{{ URL::route('teachers.courses.index', $teacher->id) }}" 
			class="waves-effect waves-teal">
@endif
		{{ Lang::get('teachers.item_menu_courses') }}
	</a>
</li>
<!-- /Cursos -->