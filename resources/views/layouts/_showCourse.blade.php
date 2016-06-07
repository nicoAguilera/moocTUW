@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-content">
            <h4>@yield('course_title')</h4>
            @yield('module_name')
            <p>
                <label>{{ Lang::get('course.show_description_label') }} </label>@yield('description')<br>
    			<label>{{ Lang::get('course.show_start_date_label') }} </label>@yield('start_date')<br>
    			<label>{{ Lang::get('course.show_end_date_label') }} </label>@yield('end_date')
    		</p><br><br>

            <!-- Sección subcontenido -->
            <div class="container-fluid">
                <div class="row">

                    <!-- Titulo -->
                    <div class="col l2">
                        <h5>@yield('resource_title')</h5>
                    </div>
                    <!-- /Titulo -->

                    <!-- Boton Agregar -->
                    <div class="col l10">
                        <a href="@yield('resource_route')" class="waves-effect waves-light btn">
                            {{ Lang::get('course.create_resource_call_to_action') }}
                        </a>
                    </div>
                    <!-- /Boton Agregar -->
                
                </div>
                
                <!-- Listado de subcontenidos -->
                <ul>
                @yield('list')
                </ul>
                <!-- /Listado de subcontenidos -->
            
            </div>
            <!-- /Sección subcontenido-->

        </div>
        <div class="card-action">
            @yield('action')
        </div>
    </div>
</div>
@stop