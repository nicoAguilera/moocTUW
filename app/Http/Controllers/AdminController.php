<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Facades
use Lang;
use Redirect;
use View;

//Models
use App\Models\Course;
use App\Models\User;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('is.admin');
	}

	public function showPanelAdmin()
	{
		$title = Lang::get('admin.panel_admin_browser_title');

		return View::make('admin.panel_admin', ['title' => $title]);
	}

	public function coursesIndex()
	{
		$title = Lang::get('courses.index_browser_title');

		$courses = Course::all();
		return View::make('admin.courses_index', ['title' => $title, 'courses' => $courses]);
	}

	public function coursesCreate()
	{
		$title = Lang::get('courses.create_browser_title');

		return View::make('admin.courses_create', compact('title'));
	}

	public function coursesShow($courseId)
	{
		$course = Course::findOrFail($courseId);
		
		$teachers = $course->teachers;

		$title = $course->name;

		return view('admin.courses_show', [
							'title' 	=> $title,
							'course' 	=> $course,
							'teachers'	=> $teachers 
						]);
	}

	public function addTeachersCourse($courseId)
	{
		$title = Lang::get('teachers.index_browser_title');

		$course = Course::findOrFail($courseId);
		$teachers = User::where('role', '=', 'teacher')->paginate(5);

		return View::make('admin.add_teachers_course', [
			'title'		=>	$title,
			'course'	=>	$course,
			'teachers'	=> 	$teachers
		]);
	}

	/* Refactorizar con el metodo create de TeacherController */
	public function teachersCreateAndAddCourse($courseId)
	{
		$course = Course::findOrFail($courseId);

		$title = Lang::get('teachers.create_browser_title');

		return View::make('admin.courses_teachers_create', ['title' => $title, 'course' => $course]);
	}

	/* Refactorizar con el metodo show de TeacherController */
	public function coursesTeachersShow($courseId, $teacherId)
	{
		$course = Course::findOrFail($courseId);

		$teacher = User::findOrFail($teacherId);

		$title = $teacher->name;

		return View::make('admin.courses_teachers_show', [
							'title'		=> $title,
							'course'	=> $course,
							'teacher'	=> $teacher
						]);
	}

	/**
	 * Realaciona un profesor con un curso
	 * @param int $courseId, $teacherId
	 * @return
	 */
	public function teacherDictateCourse($courseId, $teacherId)
	{
		$teacher = User::findOrFail($teacherId);

		$teacher->courses()->attach($courseId);

		return Redirect::route('admin.courses.show', $courseId)
						->with('alert.success', Lang::get('courses.show_teacher_dictate_course_success_alert'));
	}

	public function destroyTeacherDictateCourse($courseId, $teacherId)
	{
		$result = User::findOrFail($teacherId)->courses()->detach($courseId);

		if($result === 1)
		{
			return Redirect::route('admin.courses.show', $courseId)
						->with('alert.success', Lang::get('admin.destroy_teacher_dictate_course_alert'));
		}
		else
		{
			return Redirect::route('admin.courses.show', $courseId)
						->with('alert.danger', Lang::get('admin.failed_destroy_teacher_dictate_course_alert'));
		}
	}

	public function teachersIndex()
	{
		$title = Lang::get('teachers.index_browser_title');

		$teachers = User::where('role', '=', 'teacher')->paginate(5);

		return View::make('admin.teachers_index', [
			'title'		=>	$title,
			'teachers'	=> 	$teachers
		]);
	}

	/* Refactorizar con el metodo create de TeacherController */
	public function teachersCreate()
	{
		$title = Lang::get('teachers.create_browser_title');

		return View::make('admin.teachers_create', compact('title'));
	}

	/* Refactorizar con el metodo show de TeacherController */
	public function teachersShow($teacherId)
	{
		$teacher = User::findOrFail($teacherId);

		$title = $teacher->name;

		return View::make('admin.teachers_show', [
							'title'		=> $title,
							'teacher'	=> $teacher
						]);
	}
}
