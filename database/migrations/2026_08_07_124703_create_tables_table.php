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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('table_number');
            $table->string('qr_code_key')->nullable();
            $table->integer('capacity')->default(4);
            $table->string('shape')->default('square'); // square, circle, rectangle
            $table->string('status')->default('available'); // available, occupied, reserved
            $table->float('x_pos')->default(10);
            $table->float('y_pos')->default(10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};