<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplaceReferrantsWithForeignInClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('referrant');
            $table->dropColumn('referrant_first_name');
            $table->dropColumn('referrant_last_name');
            $table->dropColumn('referrant_phone');

            $table->unsignedInteger('referrant_id')->nullable();
            $table->foreign('referrant_id')
                ->references('id')->on('referrants')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign('clients_referrant_id_foreign');
            $table->dropColumn('referrant_id');

            $table->string('referrant')->nullable();
            $table->string('referrant_first_name')->nullable();
            $table->string('referrant_last_name')->nullable();
            $table->string('referrant_phone', 15)->nullable();
        });
    }
}
