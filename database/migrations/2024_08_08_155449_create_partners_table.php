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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('document_type_code', 5);
            $table->string('document_number', 50)->unique();
            $table->string('business_name'); // razon_social
            $table->string('trade_name'); // nombre_comercial
            $table->string('email', 80);
            $table->string('profile_logo')->nullable(); // logo_perfil
            $table->string('invoice_logo')->nullable(); // logo_comprobante
            $table->string('tax_address')->nullable(); // direccion_fiscal
            $table->string('location_code', 15)->nullable(); // ubigeo_id
            $table->enum('environment_type', ['testing', 'production'])->default('testing'); // tipo_ambiente -> environment_type
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
