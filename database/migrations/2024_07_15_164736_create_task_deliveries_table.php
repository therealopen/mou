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
        Schema::create('task_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('mou_tasks')->onDelete('cascade');
            $table->string('task_delivery_name');
            $table->string('task_delivery_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_deliveries');
    }
};
