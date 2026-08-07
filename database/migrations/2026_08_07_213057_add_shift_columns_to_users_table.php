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
        Schema::table('users', function (Blueprint $table) {
            $table->string('department')->nullable();
            $table->string('role')->nullable();
            $table->string('shift_senin')->nullable();
            $table->string('shift_selasa')->nullable();
            $table->string('shift_rabu')->nullable();
            $table->string('shift_kamis')->nullable();
            $table->string('shift_jumat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'department',
                'role',
                'shift_senin',
                'shift_selasa',
                'shift_rabu',
                'shift_kamis',
                'shift_jumat'
            ]);
        });
    }
};