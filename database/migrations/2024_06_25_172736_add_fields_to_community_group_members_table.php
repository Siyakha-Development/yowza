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
        Schema::table('community_group_members', function (Blueprint $table) {
            //
            $table->foreignId('community_group_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('community_group_members', function (Blueprint $table) {
            //
            $table->dropForeign(['community_group_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn('community_group_id');
            $table->dropColumn('user_id');
        });
    }
};
