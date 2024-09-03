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
        Schema::create('user_submenus', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('submenu_nm');
            $table->string('route_nm')->nullable(true);
            $table->string('path')->nullable(true);
            $table->unsignedSmallInteger('menu_id')->nullable(true)->comment('relate to table:user_menus, column:id');
            $table->unsignedSmallInteger('parent_id')->comment('relate to table:user_submenus, column:id; for submenu item')->nullable(true);
            $table->foreignId('created_by')->references('id')->on('users')->comment('relate to table:users, column:id');
            $table->dateTime('created_at');
            $table->foreignId('updated_by')->references('id')->on('users')->comment('relate to table:users, column:id');
            $table->dateTime('updated_at')->default(now('Asia/Jakarta'));
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_submenus');
    }
};
