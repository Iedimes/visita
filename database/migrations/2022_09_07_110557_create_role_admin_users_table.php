<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_admin_users', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_users_id');
            $table->foreign('admin_users_id')->references('id')->on('admin_users');
            $table->integer('roles_id');
            $table->foreign('roles_id')->references('id')->on('roles');
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
        Schema::dropIfExists('role_admin_users');
    }
}
