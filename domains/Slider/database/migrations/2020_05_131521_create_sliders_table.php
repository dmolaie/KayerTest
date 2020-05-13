<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('uuid')->unique()->index();
            $table->string('first_title');
            $table->dateTime('publish_date');
            $table->enum('status', config('slider.slider_statuses'));
            $table->integer('province_id')->unsigned();
            $table->enum('language', config('slider.slider_language'));
            $table->bigInteger('editor_id')->unsigned()->nullable();
            $table->bigInteger('publisher_id')->unsigned();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('province_id')->on('provinces')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('editor_id')->on('users')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parent_id')->on('sliders')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('publisher_id')->on('users')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
