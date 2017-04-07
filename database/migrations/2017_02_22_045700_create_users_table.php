<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_users_role', false)->unsigned();
            $table->string('user_name', 128)->unique();
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('image');
            $table->string('email', 64)->unique();
            $table->string('password', 64);
            $table->string('phone');
            $table->rememberToken();
            $table->tinyInteger('is_active')->default(1)->comment('1=> Active, 0=> In Active');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
            $table->foreign('fk_users_role')->references('id')->on('users_role')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
