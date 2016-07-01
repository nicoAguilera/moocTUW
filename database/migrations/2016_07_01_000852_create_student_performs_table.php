<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPerformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_performs', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned();
			$table->integer('test_id')->unsigned();
			$table->boolean('approved')->default(0);

			$table->foreign('user_id')
			      ->references('id')->on('users')
			      ->onDelete('cascade')
			      ->onUpdate('cascade');

			$table->foreign('test_id')
			      ->references('id')->on('tests')
			      ->onDelete('cascade')
			      ->onUpdate('cascade');

			$table->primary(['user_id', 'test_id']);

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student_performs');
	}

}
