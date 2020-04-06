<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('uuid')->unique()->index();
            $table->string('national_code')->unique();
            $table->enum('gender', config('user.user_genders'));
            $table->string('name');
            $table->string('last_name');
            $table->string('father_name')->nullable();
            $table->string('identity_number')->nullable();
            $table->integer('province_of_birth')->unsigned()->nullable();
            $table->integer('city_of_birth')->unsigned()->nullable();
            $table->date('date_of_birth');
            $table->text('job_title')->nullable();
            $table->string('last_education_degree')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->string('essential_mobile')->nullable();
            $table->integer('current_province_id')->unsigned();
            $table->integer('current_city_id')->unsigned();
            $table->string('email')->nullable();
            $table->enum('marital_status', config('user.user_marital_statuses'))->nullable();
            $table->string('education_field')->nullable();
            $table->integer('education_province_id')->unsigned()->nullable();
            $table->integer('education_city_id')->unsigned()->nullable();
            $table->text('current_address')->nullable();
            $table->string('home_postal_code')->nullable();
            $table->integer('province_of_work')->unsigned()->nullable();
            $table->integer('city_of_work')->unsigned()->nullable();
            $table->string('address_of_work')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('work_postal_code')->nullable();
            $table->string('know_community_by')->nullable();
            $table->string('motivation_for_cooperation')->nullable();
            $table->integer('day_of_cooperation')->nullable();
            $table->string('field_of_activities')->nullable();
            $table->string('password');
            $table->integer('event_id')->nullable();
            $table->boolean('receive_email')->nullable()->default(false);
            $table->integer('creator_id')->nullable();
            $table->string('card_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
