<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalInformationTable extends Migration
{
    public function up()
    {
        Schema::create('legal_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id'); // Foreign key for the company
            $table->string('company_cif')->nullable(); // File (PDF, DOC) - Company CIF
            $table->string('incorporation_documents')->nullable(); // File (PDF, DOC) - Incorporation & Power of Attorney documents
            $table->string('real_ownership_certificate')->nullable(); // File (PDF, DOC) - Certificate of Real Ownership
            $table->string('licenses_and_permits')->nullable(); // File (PDF, DOC) - Necessary licenses and permits for the activity
            $table->string('negative_certification_commercial_registry')->nullable(); // File (PDF, DOC) - Negative Certification from the Commercial Registry
            $table->timestamps();

            // Adding the foreign key constraint for company_id
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('legal_information');
    }
}
