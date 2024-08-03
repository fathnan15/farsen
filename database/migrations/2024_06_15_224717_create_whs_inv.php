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
        Schema::create('whs_inv', function (Blueprint $table) {
            $table->id();
            $table->string('obj_id')->index();
            $table->foreignId('unit_id')->comment('relate to table:whs_inv_unit, column:id');
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whs_inv');
    }
};
