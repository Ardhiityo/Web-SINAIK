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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->text('business_description');
            $table->string('phone_number');
            $table->string('city');
            $table->string('province');
            $table->text('address');
            $table->date('founding_year');
            $table->foreignId('business_scale_id')->constrained('business_scales')->cascadeOnDelete();
            $table->foreignId('certification_id')->nullable()->constrained('certifications')->nullOnDelete();
            $table->foreignId('umkm_id')->constrained('umkms')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
