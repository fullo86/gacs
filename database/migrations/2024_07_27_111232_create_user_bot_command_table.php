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
        Schema::create('user_bot_command', function (Blueprint $table) {
            $table->id(); 
            $table->uuid('user_id')->nullable(); // Kolom user_id, nullable
            $table->unsignedBigInteger('bot_id')->nullable(); // Kolom bot_id, nullable
            $table->string('status', 10)->default('inactive'); // Kolom status dengan default value
            $table->timestamps(); // Kolom created_at dan updated_at
    
            // Menambahkan foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('bot_id')->references('id')->on('bot_commands')->onDelete('restrict');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_bot_command');
    }
};
