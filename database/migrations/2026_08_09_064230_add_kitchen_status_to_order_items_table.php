<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Tambahkan kitchen_status jika belum ada
            if (!Schema::hasColumn('order_items', 'kitchen_status')) {
                $table->enum('kitchen_status', ['pending', 'cooking', 'completed'])->default('pending')->after('quantity');
            }

            // Tambahkan notes jika belum ada
            if (!Schema::hasColumn('order_items', 'notes')) {
                $table->string('notes')->nullable()->after('kitchen_status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            if (Schema::hasColumn('order_items', 'kitchen_status')) {
                $table->dropColumn('kitchen_status');
            }
            if (Schema::hasColumn('order_items', 'notes')) {
                $table->dropColumn('notes');
            }
        });
    }
};