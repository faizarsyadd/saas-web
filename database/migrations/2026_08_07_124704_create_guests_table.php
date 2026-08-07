<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Guest');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            
            // Kolom-kolom pendukung modul CRM & Analytics
            $table->string('ltv_segment')->default('Low LTV'); // High LTV, Medium LTV, Low LTV
            $table->decimal('total_spend', 12, 2)->default(0);
            $table->integer('visit_count')->default(0);
            $table->timestamp('last_visit')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};