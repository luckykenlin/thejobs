<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs' , function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_name')->nullable()->index();
            $table->string('job_place')->nullable()->index();
            $table->tinyInteger('job_type')->nullable();
            $table->boolean('job_status')->nullable()->default(\App\Contracts\Constant::JOB_PENDING);
            $table->string('job_salary')->nullable()->index();
            $table->string('distance')->nullable();
            $table->string('phone')->nullable();
            $table->string('job_contact')->nullable();
            $table->integer('click_count')->nullable();
            $table->text('job_desc')->nullable();
            $table->string('job_category')->nullable()->index();
            $table->string('job_level')->nullable();
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
