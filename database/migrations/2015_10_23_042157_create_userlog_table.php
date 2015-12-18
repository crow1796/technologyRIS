<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlogs', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('user_id')
                    ->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('trisusers')
                    ->onDelete('cascade');
            $table->timestamp('last_logged_in');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userlogs');
    }
}
