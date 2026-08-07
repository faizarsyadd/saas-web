<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('guest_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('user_id')->nullable()->comment('Kasir/Staff')->constrained()->onDelete('set null');
            $table->string('order_number')->unique();
            $table->string('customer_name')->default('Guest');
            $table->string('customer_phone')->nullable();
            $table->enum('order_type', ['dine_in', 'take_away'])->default('dine_in');
            $table->enum('order_status', ['pending', 'cooking', 'served', 'completed', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])->default('unpaid');
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();
    }
};