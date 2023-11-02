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
        Schema::create('menus_submenus', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('submenu_nm')->unique();
            $table->string('url')->unique();
            $table->string('menu_id')->comment('relate to table:users_menus, column:id');
            $table->foreignId('created_by')->comment('relate to table:users, column:id');
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
        Schema::dropIfExists('menus_submenus');
    }
};
