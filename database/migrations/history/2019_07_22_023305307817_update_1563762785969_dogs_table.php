<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1563762785969DogsTable extends Migration
{
    public function up()
    {
        Schema::table('dogs', function (Blueprint $table) {
            $table->dropForeign('litter_fk_187311');
            $table->dropColumn('litter_id');
        });
    }

    public function down()
    {
        Schema::table('dogs', function (Blueprint $table) {
        });
    }
}
