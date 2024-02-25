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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('transaction_product_id');
            $table->unsignedBigInteger('transaction_employe_id');
            $table->unsignedBigInteger('transaction_customer_id');
            $table->unsignedBigInteger('transaction_type_movement_id');
            $table->integer('transaction_amount');
            $table->decimal('transaction_price', $precision = 8, $scale = 2);
            $table->date('transaction_date');
            $table->tinyInteger('transaction_delete')->default(0);

            $table->foreign('transaction_product_id')
                ->references('product_id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('transaction_employe_id')
                ->references('employe_id')
                ->on('employees')
                ->onDelete('cascade');

            $table->foreign('transaction_customer_id')
                ->references('customer_id')
                ->on('customers')
                ->onDelete('cascade');

            $table->foreign('transaction_type_movement_id')
                ->references('type_movement_id')
                ->on('types_movements')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
