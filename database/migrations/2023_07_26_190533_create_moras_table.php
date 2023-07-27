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
        Schema::create('moras', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_begin')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->dateTime('date_compare')->nullable();

            $table->unsignedBigInteger('arrear_statu_id')->nullable()->foreign('arrear_status_id')->references('id')->on('arrear_status')->onDelete('set null');
            $table->unsignedBigInteger('messenger_id')->nullable()->foreign('messenger_id')->references('id')->on('messenger')->onDelete('set null');

            $table->string('table')->nullable();
            $table->string('redirect')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moras');
    }
};
