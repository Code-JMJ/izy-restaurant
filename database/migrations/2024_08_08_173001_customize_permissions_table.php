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
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('description_key')->nullable();
            $table->foreignId('permission_group_id')->nullable();
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->foreignId('partner_id')->nullable();
            $table->string('description_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
