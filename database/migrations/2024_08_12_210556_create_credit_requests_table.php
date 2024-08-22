<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('credit_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('credit_line');
            $table->decimal('amount', 15, 2);
            $table->integer('term');
            $table->date('credit_deadline');
            $table->text('fund_destination');
            $table->text('bank_selection');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('credit_requests');
    }
}
