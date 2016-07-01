<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model 
{

	protected $guarded = ['id'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'module_id'];

	/**
	 * Inverse of the relationship one to one
	 */	
	public function module()
	{
		return $this->belongsTo('App\Models\Module');
	}

	public function questions()
	{
		return $this->hasMany('App\Models\Question');
	}

	public function students()
	{
		return $this->belongsToMany('App\Models\User', 'student_performs');
	}
}
