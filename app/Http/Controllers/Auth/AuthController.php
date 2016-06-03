<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

//Facades
use Auth;
use Form;
use Lang;
use Redirect;
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
		// Llama al middleware 'guest' excepto en el caso de que este logueado.
		// Ver App/Http/kernel.php para la definición del middleware.
		$this->middleware('guest', ['except' => 'getLogout']);

		$this->middleware('auth.strict', ['only' => 'getLogout']);
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

	/**
	* Register a new user
	*
	* @param  object UserRequest
	* @return object Redirect
	*/
	protected function postSignup(UserRequest $request)
	{
		$user = User::create($request->only('name', 'email', 'password'));

		Auth::login($user);

		return Redirect::route('home')->with('alert.success', Lang::get('auth.signup_success_alert'));
	}

	/**
	* Logout the user
	*
	* @param  void
	* @return object Redirect
	*/
	protected function getLogout()
	{
		Auth::logout();

		return Redirect::route('welcome')->with('alert.success', Lang::get('auth.logout_success_alert'));
	}

	/**
	 * Show the login
	 *
	 * @param void
	 * @return object View
	 */
	protected function getLogin()
	{
		$title = Lang::get('auth.login_browser_title');

		return View::make('auth.login', compact('title'));
	}

	/**
	 * Execute the login
	 *
	 * @param object UserRequest
	 * @return object Redirect
	 */
	protected function postLogin(UserRequest $request)
	{
		if(Auth::attempt($request->only('email', 'password'), $request->has('remember_me')))
			return Redirect::intended('/');

		return Redirect::route('login')
				->withInput($request->only('email', 'remember_me'))
				->withErrors([
						'password' => Lang::get('auth.password_error_login_attempt'),
					]);
	}
}
