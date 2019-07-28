<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1563755505241DogsTable extends Migration
{
    public function up()
    {
        Schema::table('dogs', function (Blueprint $table) {
            $table->unsignedInteger('litter_id')->nullable();
            $table->foreign('litter_id', 'litter_fk_187311')->references('id')->on('litters');
        });
    }

    public function down()
    {
        Schema::table('dogs', function (Blueprint $table) {
        });
    }
}
