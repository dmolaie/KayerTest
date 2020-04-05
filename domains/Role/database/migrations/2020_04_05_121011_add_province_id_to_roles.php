<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProvinceIdToRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->integer('province_id')->after('label')->unsigned()->nullable();
            $table->enum('type', ['admin','manager','legate','client'])->after('label');
            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign('roles_province_id_foreign');
            $table->dropColumn('province_id');
            $table->dropColumn('type');
        });
    }
}
