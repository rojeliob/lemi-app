<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->after('name');
            $table->string('phone')->after('email');
            $table->string('company_name')->after('phone');  // New field
            $table->string('cif')->after('company_name');    // New field
            $table->string('antiquity')->after('cif');       // New field
            $table->string('annual_billing')->after('antiquity'); // New field
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name', 'last_name', 'phone']);
        });
    }
};
