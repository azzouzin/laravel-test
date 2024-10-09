<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTable extends Migration
{
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->text('urlPath');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('video');
    }
}
