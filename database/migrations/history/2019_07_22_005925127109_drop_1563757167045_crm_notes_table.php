<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1563757167045CrmNotesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('crm_notes');
    }
}
