<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

//Facades
use Form;
use Lang;
use View;

//Models
use App\Models\User;

class AuthController extends Controller 
{
	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	* Show the signup
	*
	* @param  void
	* @return object View
	*/
	protected function getSignup()
	{
		$title = Lang::get('auth.signup_browser_title');

		return View::make('auth.signup', compact('title'));
	}
}
