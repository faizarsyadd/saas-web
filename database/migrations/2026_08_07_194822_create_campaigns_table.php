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
    {Schema::create('campaigns', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->enum('channel', ['WhatsApp', 'Email', 'SMS']);
    $table->enum('status', ['Active', 'Draft', 'Completed', 'Scheduled'])->default('Draft');
    $table->integer('recipients_count')->default(0);
    $table->decimal('conversion_rate', 5, 2)->default(0);
    $table->decimal('revenue_generated', 12, 2)->default(0);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
