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
        Schema::create('partner_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained()->onDelete('cascade');
            $table->string('currency_code', 15);
            $table->integer('number_of_decimals')->default(2)->comment('number od decimals');
            $table->integer('expiration_notification_days')->default(7)->comment('Notify when the lot expires in X days'); // dias_ven_lotes
            $table->boolean('restrict_stock')->default(0)->comment('0:false, 1:true');
            $table->integer('round_cash_transactions')->default(1)->comment('number of decimals to round cash transactions'); // redondear_caja
            $table->boolean('electronic_invoicing')->default(0)->comment('1: Yes'); //facturacion_electronica
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_settings');
    }
};
