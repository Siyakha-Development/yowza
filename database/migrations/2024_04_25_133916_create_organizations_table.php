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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
//            $table->text('smme_business_name');
//            $table->text('smme_logo')->nullable();
//            $table->longText('smme_description_of_business');
//            $table->text('smme_industry')->nullable();
//            $table->string('smme_business_registration_number')->nullable();
//            $table->string('smme_company_size')->nullable();
//            $table->text('smme_company_address')->nullable();
//            $table->string('smme_company_email')->nullable();
//            $table->string('smme_landline_number')->nullable();
//            $table->text('smme_business_classification')->nullable();
//            $table->string('smme_established_in_year')->nullable();
//            $table->string('smme_do_you_have_a_b_bbee_certificate')->nullable();
//            $table->string('smme_b_bbee_level')->nullable();
//            $table->string('smme_black_woman_ownership')->nullable();
//            $table->string('smme_growth_in_profit')->nullable();
//            $table->string('smme_growth_in_jobs')->nullable();
//            $table->string('smme_growth_in_economic_participation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
