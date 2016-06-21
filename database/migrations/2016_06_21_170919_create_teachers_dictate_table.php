<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersDictateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers_dictate', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned();
			$table->integer('course_id')->unsigned();

			$table->foreign('user_id')
			      ->references('id')->on('users')
			      ->onDelete('cascade')
			      ->onUpdate('cascade');

			$table->foreign('course_id')
			      ->references('id')->on('courses')
			      ->onDelete('cascade')
			      ->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teachers_dictate');
	}

}
