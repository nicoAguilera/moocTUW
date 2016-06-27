<!-- Panel de administración -->
@if(Route::currentRouteName() === 'admin.panel_admin')
	<li class="bold indigo">
		<a href="" class="waves-effect waves-teal white-text">
@else
	<li class="bold">
		<a href="{{ URL::route('admin.panel_admin') }}" class="waves-effect waves-teal">
@endif
		{{ Lang::get('admin.item_menu_panel_admin') }}
	</a>
</li>
<!-- /Panel de administración -->

<!-- Cursos -->
@if(Route::currentRouteName() === 'admin.courses.index')
	<li class="bold indigo">
		<a href="" class="waves-effect waves-teal white-text">
@else
	<li class="bold">
		<a href="{{ URL::route('admin.courses.index') }}" class="waves-effect waves-teal">
@endif
		{{ Lang::get('admin.item_menu_courses') }}
	</a>
</li>
<!-- /Cursos -->

<!-- Crear curso -->
@if(Route::currentRouteName() === 'courses.create')
	<li class="bold indigo">
		<a href="" class="waves-effect waves-teal white-text">
@else
	<li class="bold">
		<a href="{{ URL::route('courses.create') }}" class="waves-effect waves-teal">
@endif
		{{ Lang::get('admin.item_menu_create_course') }}
	</a>
</li>
<!-- /Crear curso -->

<!-- Profesores -->
@if(Route::currentRouteName() === 'admin.teachers.index')
	<li class="bold indigo">
		<a href="" class="waves-effect waves-teal white-text">
@else
	<li class="bold">
		<a href="{{ URL::route('admin.teachers.index') }}" class="waves-effect waves-teal">
@endif
		{{ Lang::get('admin.item_menu_teachers') }}
	</a>
</li>
<!-- /Profesores -->