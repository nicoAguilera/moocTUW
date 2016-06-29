<!-- Cursos -->
@if(Route::currentRouteName() === 'home')
	<li class="bold indigo">
		<a href="" class="waves-effect waves-teal white-text">
@else
	<li class="bold">
		<a href="{{ URL::route('home') }}" class="waves-effect waves-teal">
@endif
		Cursos
	</a>
</li>
<!-- /Cursos -->

<!-- Historial -->
@if(Route::currentRouteName() === 'students.history')
	<li class="bold indigo">
		<a href="" class="waves-effect waves-teal white-text">
@else
	<li class="bold">
		<a href="{{ URL::route('students.history', Auth::user()->id) }}" class="waves-effect waves-teal">
@endif
		Historial
	</a>
</li>
<!-- /Historial -->

<!-- Profesores -->
@if(Route::currentRouteName() === 'students.show')
	<li class="bold indigo">
		<a href="" class="waves-effect waves-teal white-text">
@else
	<li class="bold">
		<a href="{{ URL::route('students.show', Auth::user()->id) }}" class="waves-effect waves-teal">
@endif
		Perfil
	</a>
</li>
<!-- /Profesores -->