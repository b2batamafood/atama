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

            $table->enum('status', ['active','complete','cancel'])->default('active');

            $table->integer('tax');
            $table->decimal('subtotal');
            $table->decimal('total');

            // Personal Detail
            $table->string('name');
            $table->string('company');
            $table->string('email');
            $table->string('phone');

            // Shipping Detail
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('zipcode');

            // Payment Detail
            $table->string('card_holder');
            $table->string('card_no');
            $table->string('card_exp');
            $table->string('card_cvc');

            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
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
