<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('society_id');
            $table->string('flat_no');
            $table->integer('carpet_area');
            $table->integer('floor');
            $table->string('building')->nullable();
            $table->integer('society_members_id')->nullable();
            $table->string('rented')->nullable();
            $table->integer('tenants_id')->nullable();
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
        Schema::dropIfExists('flats');
    }
}
