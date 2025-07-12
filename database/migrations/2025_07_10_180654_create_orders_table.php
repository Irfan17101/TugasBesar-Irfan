<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['kiloan', 'satuan']); 
            $table->string('service_name'); 
            $table->decimal('weight', 8, 2)->nullable(); 
            $table->integer('total_price')->default(0);
            $table->date('pickup_date');
            $table->string('pickup_time');
            $table->text('address');
            $table->text('notes')->nullable();
            $table->string('status')->default('pending');

            // ===================================================
            // INI ADALAH KOLOM YANG HILANG
            // Pastikan baris ini ada sebelum timestamps
            // ===================================================
            $table->string('snap_token')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
