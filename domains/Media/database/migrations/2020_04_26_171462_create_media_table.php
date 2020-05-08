<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('uuid')->unique()->index();
            $table->string('first_title');
            $table->enum('type', config('media.media_type'));
            $table->dateTime('publish_date');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('abstract')->nullable();
            $table->enum('status', config('media.media_statuses'));
            $table->integer('province_id')->unsigned()->nullable();
            $table->enum('language', config('media.media_language'));
            $table->bigInteger('editor_id')->unsigned()->nullable();
            $table->bigInteger('publisher_id')->unsigned();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('province_id')->on('provinces')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('editor_id')->on('users')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parent_id')->on('media')
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
        Schema::dropIfExists('media');
    }
}
