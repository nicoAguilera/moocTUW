<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ActivityRequest;

//Facades
use Lang;
use Redirect;
use View;

//Models
use App\Models\Activity;
use App\Models\Course;
use App\Models\Module;

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

		$module = Module::findOrFail($moduleId);

		$title = Lang::get('activity.create_browser_title');	
		
		return View::make('activities.create', [
									'title' 	=> $title,
									'course' 	=> $course,
									'module' 	=> $module
									]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ActivityRequest $request
	 * @return Redirect
	 */
	public function store(ActivityRequest $request)
	{
		$activity = Activity::create($request->only('title', 'module_id'));

		$module = Module::findOrFail($request->only('module_id'))->first();

		$courseId = $module->course->id;

		return Redirect::route('activities.show', [$courseId, $module->id, $activity->id])
							->with('alert.success', Lang::get('activity.create_success_alert'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $courseId, $moduleId, $activityId
	 * @return Response
	 */
	public function show($courseId, $moduleId, $activityId)
	{
		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$activity = Activity::findOrFail($activityId);

		$title = $course->name." - ".$module->name." - ".$activity->title;

		return View::make('activities.show', [
							'title'		=>	$title,
							'course'	=>	$course,
							'module'	=>	$module,
							'activity'	=>	$activity,
						]);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $courseId, $moduleId, $activityId
	 * @return Response
	 */
	public function edit($courseId, $moduleId, $activityId)
	{
		$course = Course::findOrFail($courseId);

		$module = Module::findOrFail($moduleId);

		$activity = Activity::findOrFail($activityId);

		$title = Lang::get('activity.edit_browser_title');

		return View::make('activities.edit', [
							'title' 	=> $title,
							'course' 	=> $course,
							'module' 	=> $module,
							'activity'	=> $activity, 
						]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $courseId, $moduleId, $activityId, ActivityRequest $request
	 * @return Redirect
	 */
	public function update($courseId, $moduleId, $activityId, ActivityRequest $request)
	{
		$activity = Activity::findOrFail($activityId);

		$result = $activity->update($request->only('title'));
		
		if($result === true){
			return Redirect::route('activities.show', [$courseId, $moduleId, $activityId])
					->with('alert.success', Lang::get('activity.update_success_alert'));
		}else{
			return Redirect::route('activities.edit', [$courseId, $moduleId, $activityId])
					->with('alert.danger', Lang::get('activity.update_danger_alert'));
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

}
