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
    Schema::create('incidents', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // Contoh: 'Peringatan Stok', 'Kepegawaian', 'Sistem'
        $table->string('title'); // Contoh: 'Stok Menipis: Alpukat'
        $table->text('description'); // Contoh: 'Cabang Mall Depok sangat kekurangan alpukat'
        $table->string('status')->default('Open'); // 'Open', 'Resolved', 'In Progress'
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
