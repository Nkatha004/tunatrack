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
        Schema::create('companies', function (Blueprint $table) {
            $table = \App\Utils\AppUtils::defaultTableColumns($table);
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('logo')->nullable();
            $table->string('address');
            $table->string('town');
            $table->string('country')->default('Kenya');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
