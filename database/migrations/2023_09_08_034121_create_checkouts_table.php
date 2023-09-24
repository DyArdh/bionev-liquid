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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->string('invoice')->unique();
            $table->primary('invoice');
            $table->string('name', 40);
            $table->string('no_hp', 13);
            $table->text('address');
            $table->string('city', 100);
            $table->string('province', 100);
            $table->string('zipcode', 20);
            $table->string('courier', 30);
            // $table->string('receipt')->nullable();
            $table->integer('product_id');
            $table->integer('price');
            $table->integer('qty');
            $table->bigInteger('shipping_cost');
            $table->bigInteger('total');
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
