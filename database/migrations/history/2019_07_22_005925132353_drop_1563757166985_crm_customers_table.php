<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1563757166985CrmCustomersTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('crm_customers');
    }
}
