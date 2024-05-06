<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_timbuns', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kms');
            $table->string('no_master_bl_awb');
            $table->string('no_bl_awb');
            $table->string('no_bc11');
            $table->date('tgl_bc11');
            $table->text('consignee');
            $table->string('no_voy_flight');
            $table->float('bruto');
            $table->text('document_in')->nullable();
            $table->text('document_out')->nullable();
            $table->integer('flag_gateout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_timbuns');
    }
};
