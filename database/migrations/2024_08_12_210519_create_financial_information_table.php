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
            $table->unsignedBigInteger('company_id'); // Foreign key for the company
            $table->string('company_activity')->nullable(); // Dropdown - company activity
            $table->string('business_description')->nullable(); // Alphanumeric - business description
            $table->integer('number_of_employees')->nullable(); // Numeric - number of employees
            $table->string('corporate_taxes')->nullable(); // File (PDF, DOC) - corporate taxes of last 2 years
            $table->string('balance_sheet_current_year')->nullable(); // File (PDF, DOC) - balance sheet & results of current year
            $table->string('bank_debt_summary')->nullable(); // File (PDF, DOC) - bank debt relationship (pool)
            $table->string('cirbe')->nullable(); // File (PDF, DOC) - CIRBE
            $table->string('vat_summary')->nullable(); // File (PDF, DOC) - VAT summary of last year and current year
            $table->timestamps();

            // Adding the foreign key constraint for company_id
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('financial_information');
    }
}
