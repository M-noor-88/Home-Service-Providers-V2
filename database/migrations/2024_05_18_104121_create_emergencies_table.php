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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('provider_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('service');
            $table->enum('status', ['approved', 'pending', 'rejected', 'finished'])->default('pending');
            $table->text('description');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencies');
    }
};
