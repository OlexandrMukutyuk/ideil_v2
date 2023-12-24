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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Первинний ключ
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount');
            $table->unsignedBigInteger('cart_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user__city_cards');
            $table->foreign('cart_id')->references('id')->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
