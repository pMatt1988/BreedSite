<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1563756215963DogsTable extends Migration
{
    public function up()
    {
        Schema::table('dogs', function (Blueprint $table) {
            $table->string('slug');
            $table->string('gender');
        });
    }

    public function down()
    {
        Schema::table('dogs', function (Blueprint $table) {
        });
    }
}
