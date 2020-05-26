<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientLegateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->enum('is_client', config('user.user_role_status'))->after('card_id')->default('active')->nullable();
            $table->enum('is_legate', config('user.user_role_status'))->after('card_id')->nullable();
        });
        Schema::table('users', function (Blueprint $table) {
            \DB::statement("ALTER TABLE `users` CHANGE `is_client` `is_client` ENUM('active','pending','inactive','deleted','wait_for_documents','wait_for_exam') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_client');
            $table->dropColumn('is_legate');
        });
    }
}
