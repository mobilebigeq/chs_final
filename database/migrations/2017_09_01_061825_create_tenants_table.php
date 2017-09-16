<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('society_id');
            $table->string('full_name');
            $table->text('permanent_address');
            $table->string('agreement_copy');
            $table->string('police_verification');
            $table->string('address_proof1')->nullable();
            $table->string('address_proof2')->nullable();
            $table->string('email_address')->nullable();;
            $table->string('mobile_number');
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
        Schema::dropIfExists('tenants');
    }
}
