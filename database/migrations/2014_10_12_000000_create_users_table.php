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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->enum('main_interest_in_yowza', [
                'Business Tool',
                'Business Opportunities',
                'Document Library',
                'Funding/Sponsorship',
                'Marketplace',
                'Training',
            ])->default('Business Tool');
            $table->string('mobile_number')->nullable();
            $table->string('landline_number')->nullable();
            $table->enum('gender', ['male', 'female', 'prefer not to say'])->nullable();
            $table->enum('ethnics_group', ['African', 'White', 'Coloured', 'Indian'])->nullable();
            $table->string('disability')->nullable();
            $table->enum('nationality', ['South Africa', 'Lesotho', 'Botswana', 'Zambia', 'Zimbabwe', 'Mozambique'])->default('South Africa');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('lang', 2)->default('en');
            $table->string('api_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
