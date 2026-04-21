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
        Schema::create('company_routes', function (Blueprint $table) {
            $table = \App\Utils\AppUtils::defaultTableColumns($table);
            $table->string('route_name');
            $table->string('start_location');
            $table->string('end_location');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_routes');
    }
};
