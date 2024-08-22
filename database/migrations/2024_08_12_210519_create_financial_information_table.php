<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialInformationTable extends Migration
{
    public function up()
    {
        Schema::create('financial_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->text('corporate_tax_year_1')->nullable();
            $table->text('corporate_tax_year_2')->nullable();
            $table->text('audits')->nullable();
            $table->text('balance_sheet_income_statement')->nullable();
            $table->text('vat_returns_previous_year')->nullable();
            $table->text('vat_returns_current_year')->nullable();
            $table->text('income_tax_returns_previous_year')->nullable();
            $table->text('income_tax_returns_current_year')->nullable();
            $table->text('model_390_previous_year')->nullable();
            $table->text('model_347_previous_year')->nullable();
            $table->text('bank_pool')->nullable();
            $table->text('payment_certificates_social_security_taxes')->nullable();
            $table->text('company_assets_declaration')->nullable();
            $table->text('negative_certification_registry')->nullable();
            $table->text('incorporation_powers_of_attorney')->nullable();
            $table->text('real_ownership_act')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('financial_information');
    }
}
