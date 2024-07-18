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
        Schema::create('mou_comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mou_id')->constrained('mous');
            $table->foreignId('user_id')->constrained('users');
            $table->string('mou_status');
            $table->string('mou_reason_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mou_comment');
    }
};
