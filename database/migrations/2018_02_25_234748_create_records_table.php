<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('post_id')->unsigned()->nullable();
	        $table->integer('service_id')->unsigned()->nullable();
	        $table->string('observation')->nullable();
            $table->timestamps();

	        //Relation with mascot
	        $table->foreign('post_id')
	              ->references('id')
	              ->on('posts')
	              ->onUpdate('cascade')
	              ->onDelete('cascade');

	        //Relation with services
	        $table->foreign('service_id')
	              ->references('id')
	              ->on('services')
	              ->onUpdate('cascade')
	              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
