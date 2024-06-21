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
        Schema::table('s_m_m_e_workspace_user', function (Blueprint $table) {
            //
            $table->string('role')->default('team_member'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('s_m_m_e_workspace_user', function (Blueprint $table) {
            //
        });
    }
};
