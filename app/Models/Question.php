<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $guarded = ['id'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['statement', 'test_id'];

	/**
	 * Inverse of the relationship one to many
	 */	
	public function test()
	{
		return $this->belongsTo('App\Models\Test');
	}

	public function options()
	{
		return $this->hasMany('App\Models\Option');
	}

}
