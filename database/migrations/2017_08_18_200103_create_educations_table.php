<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations' , function (Blueprint $table) {
            $table->increments('id');
            $table->string('degree')->nullable();
            $table->string('major')->nullable();
            $table->string('school')->nullable();
            $table->string('dateScopeFrom')->nullable();
            $table->string('dateScopeEnd')->nullable();
            $table->string('image')->nullable();
            $table->text('short_desc')->nullable();
            $table->timestamps();

//
            $table->integer('resume_id')->unsigned()->nullable();
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('educations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
