<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
//use Request;

use Illuminate\Http\Response;

use App\Models\Course;

class CourseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::all();
		return view('courses.index', ['courses' => $courses]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('courses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CourseRequest $request)
	{
			$course = Course::create([
				'name'			=>	$request['name'],
				'description'	=>	$request['description'],
				'start_date'	=>	$request['start_date'],
				'end_date' 		=>	$request['end_date'],
				'active'		=>	FALSE
			]);
			return view('courses.show', $course);
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
		return view('courses.show', $course);
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
