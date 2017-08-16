<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies' , function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->index();
            $table->string('location')->nullable()->index();
            $table->string('website_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('founded_on')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('social_media')->nullable();
            $table->text('short_desc')->nullable();
            $table->text('detail')->nullable();
            $table->string('employer_num')->nullable()->index();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('companies');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
