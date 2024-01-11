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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->default(0);
            $table->string('nama')->nullable();
            $table->string('icon')->nullable();
            $table->string('label')->nullable();
            $table->integer('badge')->nullable();
            $table->boolean('active')->default(false);
            $table->string('right_icon')->nullable();
            $table->string('path')->default('javascript:;');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
