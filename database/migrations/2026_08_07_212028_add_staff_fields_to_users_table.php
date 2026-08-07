<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hanya tambahkan 'role' jika belum ada
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('Staff')->after('email');
            }

            if (!Schema::hasColumn('users', 'department')) {
                $table->enum('department', ['BOH', 'FOH'])->default('FOH')->after('role');
            }

            if (!Schema::hasColumn('users', 'hourly_rate')) {
                $table->decimal('hourly_rate', 10, 2)->default(15000)->after('department');
            }

            if (!Schema::hasColumn('users', 'status')) {
                $table->enum('status', ['active', 'inactive', 'on_leave'])->default('active')->after('hourly_rate');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(array_filter([
                Schema::hasColumn('users', 'department') ? 'department' : null,
                Schema::hasColumn('users', 'hourly_rate') ? 'hourly_rate' : null,
                Schema::hasColumn('users', 'status') ? 'status' : null,
            ]));
        });
    }
};