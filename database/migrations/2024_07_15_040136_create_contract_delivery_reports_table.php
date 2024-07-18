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
        Schema::create('contract_delivery_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_delivery_id')->constrained('contract_deliveries')->onDelete('cascade');
            $table->string('report_delivery_value');
            $table->text('contract_delivery_comment')->nullable(); // Optional comment fiel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_delivery_reports');
    }
};
