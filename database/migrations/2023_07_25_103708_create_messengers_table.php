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
        Schema::create('messengers', function (Blueprint $table) {
            $table->id();
            $table->text('conclution')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('date_request')->nullable();
            $table->dateTime('date_accept')->nullable();
            $table->dateTime('date_finish')->nullable();

            $table->unsignedBigInteger('support_id')->nullable()->foreign('support_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('client_id')->nullable()->foreign('client_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('categorie_id')->nullable()->foreign('categorie_id')->references('id')->on('categories')->onDelete('set null');
            $table->unsignedBigInteger('messenger_type_id')->nullable()->foreign('messenger_type_id')->references('id')->on('messenger_types')->onDelete('set null');
            $table->unsignedBigInteger('messenger_status_id')->nullable()->foreign('messenger_status_id')->references('id')->on('messenger_status')->onDelete('set null');


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
        Schema::dropIfExists('messengers');
    }
};
