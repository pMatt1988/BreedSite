<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1563755324622LittersTable extends Migration
{
    public function up()
    {
        Schema::table('litters', function (Blueprint $table) {
            $table->dropForeign('sire_fk_187302');
            $table->dropColumn('sire_id');
            $table->dropForeign('dam_fk_187303');
            $table->dropColumn('dam_id');
        });
        Schema::table('litters', function (Blueprint $table) {
            $table->string('sire_name');
            $table->string('dam_name');
        });
    }

    public function down()
    {
        Schema::table('litters', function (Blueprint $table) {
        });
    }
}
