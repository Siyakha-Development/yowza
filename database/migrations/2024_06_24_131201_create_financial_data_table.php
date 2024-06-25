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
        Schema::create('financial_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('s_m_m_e_workspace_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('s_m_m_e_workspace_id')->references('id')->on('s_m_m_e_workspaces')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('total_income');
            $table->float('total_expenses');
            $table->float('net_income');
            $table->float('prev_mon_net_income')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_data');
    }
};
