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
        Schema::create('issuer_details', function (Blueprint $table) {
            $table->foreignId('issuer_id')->constrained('issuers');
            $table->string('curp')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('second_last_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('entity')->nullable();
            $table->foreignId('gender_id')->nullable()->constrained('genders');
            $table->foreignId('bank_id')->nullable()->constrained('banks');
            $table->string('account_number')->nullable();
            $table->string('clabe')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issuer_details');
    }
};
