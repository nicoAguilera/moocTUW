<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

//Facades
use Redirect;

class RedirectIfAuthenticated {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->check())
		{
			if($this->auth->user()->role === 'admin')
			{
				return redirect('admin');
			}
			elseif($this->auth->user()->role === 'teacher')
			{
				return Redirect::route('teachers.show', $this->auth->user()->id);
			}else{
				return new RedirectResponse(url('/home'));
			}
		}

		return $next($request);
	}

}
