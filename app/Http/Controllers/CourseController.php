<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

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
		$this->middleware('admin', ['only' => 'index']);

		//$this->middleware('auth.strict', ['only' => 'getLogout']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = Lang::get('course.index_browser_title');

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
		$title = Lang::get('course.create_browser_title');

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

		return Redirect::route('cursos.show', $course->id)->with('alert.success', Lang::get('course.create_success_alert'));
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
