<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Facades
use Redirect;

//Models
use App\Models\Course;
use App\Models\User;

class StudentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function coursesShow($studentId, $courseId)
	{
		$student = User::findOrFail($studentId);

		$course = Course::findOrFail($courseId);

		$title = $course->name;

		return view('students.courses_show', [
					'title'		=>	$title,
					'student'	=>	$student,
					'course'	=>	$course
			]);
	}

	public function enrolling($studentId, $courseId)
	{
		$student = User::findOrFail($studentId);

		$result = $student->enrolling()->attach($courseId);

		if($result === null)
		{
			return Redirect::route('students.courses.show', [$student->id, $courseId])
								->with('alert.success', 'La inscripción se realizo correctamente.');
		}
		else{
			return Redirect::route('students.courses.show', [$student->id, $courseId])
								->with('alert.danger', 'La inscripción no se realizo correctamente.');
		}
	}

	public function unsubscribe($studentId, $courseId)
	{
		$student = User::findOrFail($studentId);

		$result = $student->enrolling()->detach($courseId);

		if($result === 1)
		{
			return Redirect::route('students.courses.show', [$student->id, $courseId])
								->with('alert.success', 'La suscripción al curso a sido eliminada correctamente.');
		}
		else{
			return Redirect::route('students.courses.show', [$student->id, $courseId])
								->with('alert.danger', 'No se pudo realizar la eliminación de la suscripción al curso.');
		}
	}
}
