<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1563758694983MenusTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('menus');
    }
}
