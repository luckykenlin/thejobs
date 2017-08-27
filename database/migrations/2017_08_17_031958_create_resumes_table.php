<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
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
            $table->string('name')->nullable()->index();
            $table->string('image')->nullable()->index();
            $table->tinyInteger('status')->index();
            $table->string('job_title')->nullable()->index();
            $table->text('short_desc')->nullable();
            $table->string('location')->nullable()->index();
            $table->string('website_url')->nullable();
            $table->integer('hourly_rate')->nullable()->index();
            $table->string('age')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('cv_url')->nullable();

            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('resumes');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
