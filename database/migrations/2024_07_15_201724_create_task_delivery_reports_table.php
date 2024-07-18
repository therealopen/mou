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
        Schema::create('task_delivery_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_delivery_id')->constrained('task_deliveries')->onDelete('cascade');
            $table->string('task_report_delivery_value');
            $table->text('task_delivery_comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_delivery_reports');
    }
};
