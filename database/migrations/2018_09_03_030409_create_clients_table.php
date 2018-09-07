<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedInteger('property_id')->nullable();
            $table->foreign('property_id')->references('id')->on('properties');
            $table->date('admit_date')->nullable();
            $table->date('discharge_date')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('frp_first_name')->nullable();
            $table->string('frp_last_name')->nullable();
            $table->string('frp_phone', 10)->nullable();
            $table->string('frp_email')->nullable();
            $table->string('referrant')->nullable();
            $table->string('referrant_first_name')->nullable();
            $table->string('referrant_last_name')->nullable();
            $table->string('referrant_phone', 15)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
