<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_resume' , function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id');
            $table->integer('resume_id')->nullable();
            $table->tinyInteger('status')->nullable()->default(\App\Contracts\Constant::RESUME_STATUS['NEW']);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('job_resume');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
