<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Facades
use Lang;
use View;

//Models
use App\Models\Course;

class ActivityController extends Controller {

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
	 * @param int $courseId, $moduleId
	 * @return Response
	 */
	public function create($courseId, $moduleId)
	{

		$course = Course::findOrFail($courseId);

		$module = $course->modules()->where('id', '=', $moduleId)->first();

		if($module === null)
		{
			abort(404);
		}
		else
		{
			$title = Lang::get('activity.create_browser_title');	
			
			return View::make('activities.create', [
										'title' 	=> $title,
										'course' 	=> $course,
										'module' 	=> $module
										]);
		}
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

}
