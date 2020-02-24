<?php

use Domains\User\Entities\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('national_code')->unique();
            $table->string('last_name');
            $table->enum('gender',config('user.user_genders'));
            $table->date('date_of_birth');
            $table->string('mobile');
            $table->integer('current_province_id')->unsigned();
            $table->integer('current_city_id')->unsigned();
            $table->text('current_address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('province_of_work')->unsigned()->nullable();
            $table->integer('city_of_work')->unsigned()->nullable();
            $table->string('essential_mobile')->nullable();
            $table->integer('province_of_birth')->unsigned()->nullable();
            $table->integer('city_of_birth')->unsigned()->nullable();
            $table->string('identity_number')->nullable();
            $table->enum('marital_status',config('user.user_marital_statuses'));
            $table->text('job_title')->nullable();
            $table->string('educational_field')->nullable();
            $table->string('last_education_degree')->nullable();
            $table->string('address_of_obtaining_degree')->nullable();
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
                'address_of_obtaining_degree',
                'last_education_degree',
                'educational_field',
                'job_title',
                'marital_status',
                'identity_number',
                'city_of_birth',
                'province_of_birth',
                'essential_mobile',
                'city_of_work',
                'province_of_work',
                'phone',
                'current_address',
                'current_city_id',
                'current_province_id',
                'mobile',
                'date_of_birth',
                'gender',
                'last_name',
                'national_code',
            ]);
        });
    }
}
