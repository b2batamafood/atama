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
        Schema::create('quickbook_credentials', function (Blueprint $table) {
            $table->id();

            $table->string('client_id');
            $table->string('client_secret');
            $table->string('redirect_url');
            $table->string('access_token');
            $table->string('refresh_token');
            $table->string('realm_id');
            $table->string('base_url');
            $table->string('api_url');
            $table->boolean('status')->default(0);
            $table->string('updating_time');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quickbook_credentials');
    }
};
