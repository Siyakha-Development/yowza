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
        Schema::create('call_to_actions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('introduction_image')->nullable();
            $table->string('full_article_image')->nullable();
            $table->text('content');
            $table->dateTime('closing_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_to_actions');
    }
};
