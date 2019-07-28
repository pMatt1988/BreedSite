<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1563753810549DogsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('dogs')) {
            Schema::create('dogs', function (Blueprint $table) {
                $table->increments('id');
                $table->longText('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('dogs');
    }
}
