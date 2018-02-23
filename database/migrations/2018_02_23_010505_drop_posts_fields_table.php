<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPostsFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('posts', function (Blueprint $table) {
			$table->dropColumn('client_name');
			$table->dropColumn('email');
			$table->dropColumn('phone');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function (Blueprint $table) {
			$table->string('client_name');
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
		});
	}
}
