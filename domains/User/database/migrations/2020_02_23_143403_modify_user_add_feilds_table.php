<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUserAddFeildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('day_of_cooperation')->nullable();
            $table->string('know_community_by')->nullable();
            $table->string('motivation_for_cooperation')->nullable();
            $table->string('field_of_activities')->nullable();
            $table->string('address_of_work')->nullable();
            $table->string('work_phone')->nullable();
            $table->softDeletes();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'day_of_cooperation',
                'know_community_by',
                'motivation_for_cooperation',
                'field_of_activities',
                'address_of_work',
                'work_phone',
                'created_at',
                'updated_at',
            ]);
        });
    }
}
