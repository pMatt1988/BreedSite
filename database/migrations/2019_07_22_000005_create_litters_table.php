<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLittersTable extends Migration
{
    public function up()
    {
        Schema::create('litters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birthdate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
