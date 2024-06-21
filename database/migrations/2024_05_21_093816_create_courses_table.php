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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //            $table->foreignId('course_category_id')->constrained('course_categories')->onDelete('cascade');
            $table->enum('course_category', [
                'Finance',
                'Management',
                'Marketing and Sales',
                'Personal Growth',
                'Customer Service',
                'Funding',
                'Entrepreneurship'
            ]);
            $table->string('course_category_image')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable()->default(0);
            $table->string('course_image')->nullable();
            $table->date('start_date')->nullable();
            $table->tinyInteger('published')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
