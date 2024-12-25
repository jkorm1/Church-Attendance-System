<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemesTable extends Migration
{
    public function up()
    {
        Schema::create('memes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('memes');
    }
}
