<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('title');
            $table->text('abstract')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('publish_date');
            $table->dateTime('event_start_date');
            $table->dateTime('event_end_date');
            $table->dateTime('event_start_register_date');
            $table->dateTime('event_end_register_date');
            $table->string('source_link_text')->nullable();
            $table->string('source_link_video')->nullable();
            $table->string('source_link_image')->nullable();
            $table->string('location')->nullable();
            $table->enum('status', config('events.events_statue'));
            $table->integer('province_id')->unsigned();
            $table->enum('language', config('events.event_language'));
            $table->bigInteger('editor_id')->unsigned()->nullable();
            $table->bigInteger('publisher_id')->unsigned();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('province_id')->on('provinces')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('editor_id')->on('users')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('parent_id')->on('events')
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
        Schema::dropIfExists('events');
    }
}
