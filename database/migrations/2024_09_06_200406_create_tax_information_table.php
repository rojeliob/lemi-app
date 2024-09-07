<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxInformationTable extends Migration
{
    public function up()
    {
        Schema::create('tax_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id'); // Foreign key for the company
            $table->string('modelo_347')->nullable(); // File (PDF, DOC) - Modelo 347
            $table->string('modelo_349')->nullable(); // File (PDF, DOC) - Modelo 349
            $table->string('vat_settlements')->nullable(); // File (PDF, DOC) - VAT settlements for previous and current year
            $table->string('irpf_settlements')->nullable(); // File (PDF, DOC) - IRPF settlements for previous and current year
            $table->string('modelo_390_previous_year')->nullable(); // File (PDF, DOC) - Modelo 390 of the previous year, if required
            $table->string('modelo_347_previous_year')->nullable(); // File (PDF, DOC) - Modelo 347 of the previous year, if required
            $table->string('payment_certificates_social_security_taxes')->nullable(); // File (PDF, DOC) - Certificates of payment to Social Security and Tax authorities
            $table->string('company_assets_declaration')->nullable(); // File (PDF, DOC) - Company assets declaration, if assets exist
            $table->timestamps();

            // Foreign key constraint linking to the companies table
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tax_information');
    }
}
