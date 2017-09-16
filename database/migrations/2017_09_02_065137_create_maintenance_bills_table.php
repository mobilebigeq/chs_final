<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('society_id');
             $table->integer('flat_id');
            $table->string('bill_number');
            $table->string('amount');
            $table->date('due_date');
            $table->string('extra_charge')->nullable();
            $table->string('charge_name')->nullable();
            $table->string('charge_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_bills');
    }
}
