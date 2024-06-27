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
        Schema::table('listings', function (Blueprint $table) {
            $table->enum('category',['Digital','Technology','mobile phone','computers/laptop','health']);
            $table->enum('condition',['new','used - like new','used - good','used - fair']);
            $table->enum('availability',['list as single item','list as in stock']);
            $table->string('sku')->nullable();
            $table->string('tags')->nullable();
            $table->json('preferences'); // Assuming preferences is a JSON field
            $table->boolean('boost_listing')->default(false);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn(['category','condition','availability','sku','tags','preferences','boost_listing']);
        });
    }
};
