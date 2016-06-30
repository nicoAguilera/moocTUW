# Aplicación MOOC #

* [Descripción de la aplicación](#descripción-de-la-aplicación)
* [Procedimiento para ejecutar el proyecto en local](#procedimiento-para-ejecutar-el-proyecto-en-local)
* [Requerimientos implementados](#requerimientos-implementados)
* [Roles de los distintos usuarios](#roles-de-los-distintos-usuarios)
* [Laravel 5.0 on OpenShift](#laravel-50-on-openshift)
** [OpenShift Considerations](#openshift-considerations)

## Descripción de la aplicación ##

Una nueva empresa en el mercado del rubro educación necesita de una plataforma Online que permita gestionar Cursos Online Masivos y Abiertos (en inglés MOOC). Algunas de las características de esta plataforma son: 
*	Acceso masivo de cientos de miles de estudiantes de todo el mundo.
*	Acceso libre, abierto, pues no requiere una prueba de conocimientos previos ni ser alumno de la institución que ofrece el Mooc.
*	Acceso gratuito ya que no requiere pago por el acceso a los contenidos y a la plataforma que realiza el curso. No obstante, podría estar arancelado el acceso a tutorías, evaluaciones, recursos bibliográficos o acreditaciones.
*	Desarrollo completamente en línea que permite utilizar la potencialidad de internet (audio, texto, vídeo, animación).
*	Interacción (asincrónica o sincrónica) en línea entre los alumnos a través de foros o herramientas de videoconferencia (hangouts, por ejemplo). Es importante que exista algún tipo de interacción estudiante-estudiante y estudiantes-profesores, aunque esta esté mediada por la tecnología. 
*	Se trata de una acción formativa diseñada y orientada al aprendizaje. Posee una serie de pruebas que acreditan haber adquirido el conocimiento.
*	Realizarse en línea, compartiendo características de la formación a distancia mediada a través de Internet tales como: programación y planificación de actividades, tutorización de estudiantes, evaluación de aprendizajes, etc.

## Requerimientos implementados ##

Módulo de Gestión de Cursos
* Gestión de Cursos

Módulo de Gestión de Usuarios/Alumnos
* Gestión de Usuarios
* Seguimiento del alumno en cursos tomados


### Módulo de Gestión de Cursos ###

La gestión de los cursos involucra la creación, modificación y mantenimiento del curso por los usuarios administrativos y profesores. El personal administrativo podrá crear cursos con un calendario establecido y asignar a este los profesores que dictarán el mismo.
Los usuarios profesores podrán gestionar el material educativo que dispondrá el curso.

### Módulo de Gestión de Usuarios/Alumnos ###
La gestión de los alumnos involucra el registro de los usuarios en la plataforma y la inscripción de los mismos al curso que deseen tomar.
El submódulo de seguimiento será el encargado de mantener el estado del alumno en un curso activo como así también llevar un historial de los cursos tomados por el alumnado.



## Procedimiento para ejecutar el proyecto en local ##

Si desea clonar este proyecto y ejecutarlo de forma local en su máquina, siga estos pasos:

* Clonar el proyecto al directorio deseado
* Desde la linea de comandos posicionarse en el directorio raiz del proyecto y ejecutar el comando:

```
composer install
```
Este comando instalara las dependencias necesarias para el proyecto dentro de la carpeta vendor en la raiz
del proyecto.
* Crear una base de datos mysql llamada 'mooc'.
* Modificar el archivo `.env` que se  encuentra en la carpeta raíz del proyecto modificando las variables de entorno locales `DB_DATABASE`, `DB_USERNAME` y `DB_PASSWORD` con los siguientes valores:

```
DB_DATABASE=mooc
DB_USERNAME=root
DB_PASSWORD=
```

* Ejecutar el siguiente comando:

```
php artisan migrate
```

Este comando ejecutara las migraciones que se encuentran en la carpeta `database/migrations` generando todas las tablas necesarias para la aplicacion

* Ejecutar el siguiente comando para poblar la base de datos con los valores iniciales de prueba para la
aplicación:

```
php artisan db:seed
```

## Roles de los distintos usuarios ##


# Laravel 5.0 on OpenShift #
[Laravel](http://laravel.com/) is a free, open source PHP web application framework, 
designed for the development of model–view–controller (MVC) web applications.

This QuickStart was created to make it easy to get started with Laravel 5.0 on
OpenShift.

The simplest way to install this application is to use the [OpenShift
QuickStart](https://hub.openshift.com/quickstarts/115-laravel-5-0). If 
you'd like to install it manually, follow [these directions](#manual-installation).

## OpenShift Considerations ##
These are some special considerations you may need to keep in mind when
running your application on OpenShift.

### Local vs. Remote Development ###
This Laravel QuickStart provides separate `.env` configuration files for both local and 
remote development, found at `.env` and `.openshift/.env` respectively. When the local 
repo is pushed to OpenShift `.env` is overwritten with the `.openshift/.env` file.

### Remote Development ###
Your application is configured to automatically use your OpenShift MySQL or PostgreSQL 
database in when deployed on OpenShift using [OpenShift Environment Variables](https://developers.openshift.com/en/managing-environment-variables.html).

Additionally, your `APP_ENV`, `APP_URL`, and `APP_KEY` will be set automatically in 
production on OpenShift.

The Laravel `CACHE_DRIVER` is set to use [APC opcode caching](http://php.net/manual/en/book.apc.php)
and the `SESSION_DRIVER` is set to use the local file system for storage. Feel 
free to update these settings in `.openshift/.env`.

### Laravel Migrations ###
When the application is pushed to OpenShift, `php artisan migrate --force` is automatically executed.

### Composer ###
When the application is pushed, `composer install` is automatically executed over the root directory. See [PHP Markers](https://developers.openshift.com/en/php-markers.html) for more details on the 'use_composer' marker.

### 'Development' Mode ###
When you develop your Laravel application in OpenShift, you can also enable the
'development' environment by setting the `APPLICATION_ENV` environment variable,
using the `rhc` client, like:

```
$ rhc env set APPLICATION_ENV=development -a <app-name>
```

Then, restart your application:

```
$ rhc app restart -a <app-name>
```

If you do so, OpenShift will run your application under 'development' mode.
In development mode, your application will:

* Set Laravel's `APP_ENV` to 'development' and `APP_DEBUG` to 'true'
* Ignore your composer.lock file
* Show more detailed errors in browser
* Display startup errors
* Enable the [Xdebug PECL extension](http://xdebug.org/)
* Enable [APC stat check](http://php.net/manual/en/apc.configuration.php#ini.apc.stat)

Set the variable to 'production' and restart your app to deactivate error reporting 
and resume production PHP settings.

Using the development environment can help you debug problems in your application
in the same way as you do when developing on your local machine. However, we strongly 
advise you not to run your application in this mode in production.

### Log Files ###
Your application is configured to use the OpenShift log directory. You can use the 
`rhc tail` command to stream the latest log file entries:

```
rhc tail -a <APP_NAME>
```

To stop tailing the logs, press *Ctrl + c*.

## Manual Installation ##

1. Create an account at https://www.openshift.com/

1. Create a Laravel application:

    ```
    rhc app create laravelapp php-5.4 mysql-5.5 --from-code=https://github.com/luciddreamz/laravel
    ```
    or

    ```
    rhc app create laravelapp php-5.4 postgresql-9.2 --from-code=https://github.com/luciddreamz/laravel
    ```

## Additional Resources ##
Documentation for the Laravel framework can be found on the [Laravel website](http://laravel.com/docs). Check 
out OpenShift's [Developer Portal](https://developers.openshift.com/en/php-overview.html) for help running PHP on OpenShift.