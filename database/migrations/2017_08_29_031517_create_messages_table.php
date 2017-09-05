<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->string('email')->nullable();
            $table->string('file_url')->nullable();

            $table->timestamps();

            $table->integer('messageable_id');
            $table->string('messageable_type');
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
        Schema::dropIfExists('messages');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
