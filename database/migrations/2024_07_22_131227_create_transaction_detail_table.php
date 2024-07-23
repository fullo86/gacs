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
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->string('order_id', 50)->primary();
            $table->string('status_code', 5);
            $table->string('trasanction_status', 100);
            $table->string('payment_type', 50);
            $table->dateTime('transaction_time');
            $table->string('bank', 20);
            $table->string('va_number', 50);
            $table->string('pdf_url', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
