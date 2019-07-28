<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1563754110830DogsTable extends Migration
{
    public function up()
    {
        Schema::table('dogs', function (Blueprint $table) {
            $table->string('name');
            $table->date('birthdate')->nullable();
        });
    }

    public function down()
    {
        Schema::table('dogs', function (Blueprint $table) {
        });
    }
}
