<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeRolePriorityRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("UPDATE `roles` SET `priority` = '5' WHERE `roles`.`id` = 4;");
        \DB::statement("ALTER TABLE `roles` CHANGE `type` `type` ENUM('admin','manager','legate','client','support') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;");
        \DB::statement("INSERT INTO `roles` (`id`, `name`, `label`, `type`, `priority`, `province_id`, `created_at`, `updated_at`) VALUES ('3', 'support', 'پشتیبان', 'support', '4', NULL, '2020-05-12 17:44:04', '2020-05-12 17:44:04');");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
