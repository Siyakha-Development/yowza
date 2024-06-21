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
        Schema::create('download_histories', function (Blueprint $table) {
            $table->id();

            $table->BigInteger('document_id')->default(0);;
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('downloaded_at')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('document_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('download_histories');
    }
};
