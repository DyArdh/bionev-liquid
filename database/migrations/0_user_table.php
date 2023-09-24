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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->string('bod', 40);
            $table->enum('gender', ['male', 'female']);
            $table->text('address');
            $table->string('phone', 13);
            $table->string('email', 40)->unique();
            $table->string('password');
            $table->enum('role', ['Admin', 'User'])->default('User');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
