<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('resumes', function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();

        $table->uuid('uuid');
        $table->string('filename_original');

        $table->integer('application_id')->unsigned();
        $table->foreign('application_id')->references('id')->on('applications')
          ->onUpdate('cascade')->onDelete('cascade');

        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')
          ->onUpdate('cascade')->onDelete('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('resumes');
  }
}
