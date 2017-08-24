<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences' , function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('positon')->nullable();
            $table->string('dateScopeFrom')->nullable();
            $table->string('dateScopeEnd')->nullable();
            $table->string('image')->nullable();
            $table->text('desc')->nullable();

            $table->timestamps();

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
        Schema::dropIfExists('experiences');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
