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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID Pembeli
            $table->string('invoice_number')->unique();
            $table->bigInteger('total_amount');
            $table->enum('status', ['baru', 'diproses', 'dikirim', 'selesai', 'dibatalkan'])->default('baru');
            $table->text('shipping_address');
            // Tambahkan kolom lain jika perlu, seperti kurir, ongkir, dll.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
