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
        Schema::create('partner_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->decimal('sales_tax', 10, 2)->default(18.00); // factor_igv
            $table->enum('print_invoice', ['no', 'pdf', 'direct'])->default('pdf');
            $table->enum('print_cash_closure', ['no', 'pdf', 'direct'])->default('pdf');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_branches');
    }
};
