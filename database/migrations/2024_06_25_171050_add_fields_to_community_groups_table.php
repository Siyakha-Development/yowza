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
        Schema::table('community_groups', function (Blueprint $table) {
            //
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // group creator
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_private')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('community_groups', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('is_private');
        });
    }
};
