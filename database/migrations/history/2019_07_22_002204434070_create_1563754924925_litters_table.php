<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1563754924925LittersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('litters')) {
            Schema::create('litters', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('sire_id');
                $table->foreign('sire_id', 'sire_fk_187302')->references('id')->on('dogs');
                $table->unsignedInteger('dam_id');
                $table->foreign('dam_id', 'dam_fk_187303')->references('id')->on('dogs');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('litters');
    }
}
