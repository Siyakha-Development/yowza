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
        Schema::create('contact_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->enum('status',['new','in-progress','resolved'])->default('new');
            $table->string('email',100)->nullable();
            $table->string('subject',100)->nullable();
            $table->string('message', 10000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_forms');
    }
};
