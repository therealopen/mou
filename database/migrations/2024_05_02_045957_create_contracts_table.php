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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultant_id')->constrained();
            $table->string('contract_name');
            $table->string('contract_type');
            $table->string('contract_description');
            $table->string('contract_startDate');
            $table->string('contract_endDate');
            $table->string('site_delivery');
            $table->string('contract_value');
            $table->string('employer');
            $table->string('approval_status')->default('pending_approval');
            $table->string('status_tpc')->default('not started');
            $table->string('contract_document')->nullable();// Optional comment field;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
