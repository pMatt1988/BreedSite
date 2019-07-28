<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogsTable extends Migration
{
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('description')->nullable();
            $table->string('name');
            $table->date('birthdate')->nullable();
            $table->string('slug');
            $table->string('gender');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
