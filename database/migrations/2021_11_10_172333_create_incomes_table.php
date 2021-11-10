<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->double('amount', 8, 2)->default(0.0);
            $table->foreignId('category_id')->constrained();
            $table->string('payment_method')->default('cash');
            $table->foreignId('bank_id')->nullable()->constrained();
            $table->unsignedTinyInteger('payment_gateway')->default(0);
            $table->string('cheque_no')->nullable();
            $table->string('place', 255)->nullable()->default(null);
            $table->string('description', 255)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
