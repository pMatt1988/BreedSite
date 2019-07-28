<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1563759374699LittersTable extends Migration
{
    public function up()
    {
        Schema::table('litters', function (Blueprint $table) {
            $table->dropColumn('sire_name');
            $table->dropColumn('dam_name');
        });
    }

    public function down()
    {
        Schema::table('litters', function (Blueprint $table) {
        });
    }
}
