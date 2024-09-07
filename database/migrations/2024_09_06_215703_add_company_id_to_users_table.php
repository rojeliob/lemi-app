<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyIdToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the company_id column to reference the companies table
            $table->unsignedBigInteger('company_id')->nullable()->after('id');

            // Set up the foreign key constraint
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key and column if rolling back
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
    }
}
