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
        Schema::create('menu_references', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->nullable()->foreign('menu_id')->references('id')->on('menus')->onDelete('set null');
            $table->unsignedBigInteger('submenu_id')->nullable()->foreign('submenu_id')->references('id')->on('menus')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_references');
    }
};
