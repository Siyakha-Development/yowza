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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('description');
            $table->enum('location',[
                'Johannesburg (Gauteng)',
                'Cape Town (Western Cape)',
                'Durban (KwaZulu-Natal)',
                'Pretoria (Gauteng)',
                'Port Elizabeth (Eastern Cape)',
                'Bloemfontein (Free State)',
                'Kimberley (Northern Cape)',
                'Nelspruit (Mpumalanga)',
                'Pietermaritzburg (KwaZulu-Natal)',
                'Welkom (Free State)',
                'Rustenburg (North West)',
                'Vereeniging (Gauteng)',
                'Tembisa (Gauteng)',
                'Benoni (Gauteng)',
                'Middelburg (Mpumalanga)',
                'George (Western Cape)',
                'Newcastle (KwaZulu-Natal)',
                'Klerksdorp (North West)',
                'Carletonville (Gauteng)',
                'Uitenhage (Eastern Cape)',
                'Krugersdorp (Gauteng)',
            ])->default('Johannesburg (Gauteng)');
            $table->enum('event_type',['online','physical'])->default('online');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->date('event_date')->nullable();
            $table->string('event_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
