<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1563757063501CrmStatusesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('crm_statuses')) {
            Schema::create('crm_statuses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('crm_statuses');
    }
}
