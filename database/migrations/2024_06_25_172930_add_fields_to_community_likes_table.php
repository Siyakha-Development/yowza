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
        Schema::table('community_likes', function (Blueprint $table) {
            //
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->morphs('likeable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('community_likes', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->dropMorphs('likeable');
            $table->dropColumn('user_id');
        });
    }
};
