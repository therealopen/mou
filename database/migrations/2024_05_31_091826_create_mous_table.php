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
        Schema::create('mous', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained('partners');
            $table->string('mou_title');
            $table->text('mou_description');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('mou_document')->nullable();// Optional comment field
            $table->string('approval_mou_status')->default('pending_approval');
            $table->string('status_tpc')->default('0');
            // Timestamps
            $table->timestamps();
            // add more column here
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mous');
    }
};
