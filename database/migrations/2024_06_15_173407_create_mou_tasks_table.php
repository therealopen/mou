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
        Schema::create('mou_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mou_id')->constrained('mous');
            $table->string('Task_title');
            $table->text('Task_description');
            $table->string('task_status_name')->default('Not Started');
            $table->date('task_start_date');
            $table->date('task_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mou_tasks');
    }
};
