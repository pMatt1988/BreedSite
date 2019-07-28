<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1563762863754LittersTable extends Migration
{
    public function up()
    {
        Schema::table('litters', function (Blueprint $table) {
            $table->unsignedInteger('sire_id');
            $table->foreign('sire_id', 'sire_fk_187373')->references('id')->on('dogs');
            $table->unsignedInteger('dam_id');
            $table->foreign('dam_id', 'dam_fk_187374')->references('id')->on('dogs');
        });
    }

    public function down()
    {
        Schema::table('litters', function (Blueprint $table) {
        });
    }
}
