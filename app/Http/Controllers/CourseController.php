<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CourseAndModuleRequest;

use Illuminate\Http\Response;

//Facades
use Form;
use Lang;
use Redirect;

//Models
use App\Models\Course;

class CourseController extends Controller {

	public function __construct()
	{
		//ver controllers controller-middleware de la documentación de laravel
		$this->middleware('is.admin', ['only' => ['index', 'create', 'store']]);

		//$this->middleware('auth.strict', ['only' => 'getLogout']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = Lang::get('courses.index_browser_title');

		$courses = Course::all();
		return view('courses.index', ['title' => $title, 'courses' => $courses]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$title = Lang::get('courses.create_browser_title');

		return view('courses.create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CourseRequest $request
	 * @return Redirect
	 */
	public function store(CourseRequest $request)
	{
		$course = Course::create($request->only('name', 'description', 'start_date', 'end_date'));

		return Redirect::route('admin.courses.show', $course->id)
				->with('alert.success', Lang::get('courses.create_success_alert'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = Course::findOrFail($id);
		$title = $course->name;

		return view('courses.show', ['course' => $course, 'title' => $title]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::findOrFail($id);

		$title = Lang::get('courses.edit_browser_title');

		return view('courses.edit', ['course' => $course, 'title' => $title]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id, CourseRequest $request
	 * @return Response
	 */
	public function update($id, CourseRequest $request)
	{
		$course = Course::findOrFail($id);

		$result = $course->update($request->only('name', 'description', 'start_date', 'end_date'));
		
		if($result === true){
			return Redirect::route('admin.courses.show', $course->id)->with('alert.success', Lang::get('courses.update_success_alert'));
		}else{
			return Redirect::route('admin.courses.edit', $course->id)->with('alert.danger', Lang::get('courses.update_danger_alert'));
		}
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

	public function publishingCourse(Request $request)
	{
		$course = Course::findOrFail($request->only('courseId'))->first();

		$result = $course->update(["active" => 1]);

		/*if($result === true)
		{
			return Redirect::route('teachers.show', (int)$request["teacherId"])
						->with('alert.succes', 'El curso '.$course->name.' se publico correctamente.');
		}
		else
		{
			return Redirect::route('teachers.courses.index', $request["teacherId"])
						->with('alert.danger', 'No se realizo la publicación del curso');
		}*/
	}

	public function showEditor($id)
	{
		$course = Course::find($id);
		return view('courses.showEditor', $course);
	}

	public function saveChanges(Request $request)
	{
		/*return response()->json([
				"mje" => Request::input('main-content')
			]);*/
		/*if($request->ajax()){
			return response()->json([
					"mensaje" => $request->all()
				]);
		}else{
			return response()->json([
					"mensaje" => $request
				]);
		}*/
		return response()->json(['response'=> $request->all()]);
		//return Request::input('main-content');
	}
}
