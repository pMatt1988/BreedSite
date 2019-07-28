<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPicturePathToDogsTable extends Migration
{
    public function up()
    {
        Schema::table('dogs', function (Blueprint $table) {
        });
        Schema::table('dogs', function (Blueprint $table) {
            $table->string('picture_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('dogs', function (Blueprint $table) {
        });
    }
}
