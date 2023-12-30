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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 19);
            $table->string('name', 10);
            $table->string('description', 100);

            $table->string('barcode', 25);
            $table->string('price');
            $table->string('cost');
            $table->string('tax');
            $table->string('photo_url')->nullable();
            /*
            $table->string('inventory', 10);
            $table->string('unit_of_measurement', 20);
            $table->string('location', 10);
            $table->string('retail_price', 1);
            */

            $table->foreignId('category_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('brand_id')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
