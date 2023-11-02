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
        Schema::create('users_menus', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('menu_nm')->unique();
            $table->string('icon')->default('fas fa-prescription"');
            $table->foreignId('created_by');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->default(now('Asia/Jakarta'));
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_menus');
    }
};
