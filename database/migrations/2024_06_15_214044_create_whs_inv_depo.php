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
        Schema::create('whs_inv_depo', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('org_id')->comment('relate to table:farsen_orgs, column:id');
            $table->string('obj_id');
            $table->string('batch');
            $table->dateTime('expired_dttm');
            $table->integer('depo_qty');
            $table->dateTime('stok_opname_dttm')->default(now('Asia/Jakarta'));
            $table->foreignId('stok_opname_by_id')->comment('relate to table:user, column:id');

            $table->index('obj_id');
            $table->index('expired_dttm');
            $table->index('stok_opname_dttm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whs_inv_depo');
    }
};
