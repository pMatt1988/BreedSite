<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1563755444347LittersTable extends Migration
{
    public function up()
    {
        Schema::table('litters', function (Blueprint $table) {
            $table->string('name');
            $table->date('birthdate')->nullable();
        });
    }

    public function down()
    {
        Schema::table('litters', function (Blueprint $table) {
        });
    }
}
