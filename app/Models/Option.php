<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model {

	protected $guarded = ['id'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['answer', 'correct', 'question_id'];

	/**
	 * Inverse of the relationship one to many
	 */	
	public function question()
	{
		return $this->belongsTo('App\Models\Question');
	}

}
