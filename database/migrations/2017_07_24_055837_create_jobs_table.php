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
            $table->tinyInteger('working_days')->nullable();
            $table->tinyInteger('job_type')->nullable()->index();
            $table->boolean('job_status')->nullable()->default(\App\Contracts\Constant::JOB_EMPTY);
            $table->integer('job_salary')->nullable()->index();
            $table->string('distance')->nullable();
            $table->string('phone')->nullable();
            $table->string('job_contact')->nullable();
            $table->integer('click_count')->nullable();
            $table->text('job_desc')->nullable();
            $table->text('short_desc')->nullable();
            $table->string('job_category')->nullable()->index();
            $table->string('job_level')->nullable();
            $table->timestamps();

//            $table->integer('user_id')->unsigned();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

//            $table->integer('category_id')->unsigned();
//            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('candidate_id')->unsigned()->nullable();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('jobs');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
