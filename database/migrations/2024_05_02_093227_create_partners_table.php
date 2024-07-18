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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            // Udom University Information
            $table->string('company_name');
            $table->text('company_address');
            $table->string('company_contact_number');
            $table->string('company_email');
            $table->string('representation_name');
            $table->string('representative_title');
            $table->string('representative_email');
            $table->string('representative_number');
            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
