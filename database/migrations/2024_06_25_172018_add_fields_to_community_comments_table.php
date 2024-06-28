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
        Schema::table('community_comments', function (Blueprint $table) {
            //
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('community_post_id')->constrained()->onDelete('cascade');
            $table->text('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('community_comments', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->dropForeign(['community_post_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('community_post_id');
            $table->dropColumn('content');
        });
    }
};
