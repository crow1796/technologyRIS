<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrisusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trisusers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            
            $table->foreign('permission_id')
                    ->references('id')
                        ->on('permissions')
                            ->onDelete('cascade');

            $table->string('username')->unique();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('password');
            $table->string('email')->unique();
            
            $table->string('slug');

            $table->rememberToken();
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
        Schema::drop('trisusers');
    }
}
