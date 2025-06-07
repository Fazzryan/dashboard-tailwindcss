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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default('Active'); // Active, Completed, On Hold, Cancelled
            $table->unsignedTinyInteger('progress')->default(0); // 0–100
            $table->string('client')->nullable();
            $table->string('priority')->default('Medium'); // High, Medium, Low
            $table->date('deadline')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
