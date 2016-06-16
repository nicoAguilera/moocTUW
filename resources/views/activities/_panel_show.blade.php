@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col s12">
                @yield('title')

                <!-- Contenido de la actividad -->
                <div class="container-fluid">
                    <div class="row">
                    
                    </div>
                </div>
                <!-- /Contenido de la actividad-->

                @yield('action')
            </div>
        </div>
    </div>
    
@stop