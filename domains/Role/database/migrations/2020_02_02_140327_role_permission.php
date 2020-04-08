<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolePermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->index();
            $table->unsignedBigInteger('permission_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->primary(['role_id', 'permission_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
