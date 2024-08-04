<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_routes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('http_req');
            $table->string('uri');
            $table->string('controller');
            $table->string('action');
            $table->string('name');
            $table->boolean('is_auth')->default(1);
            $table->foreignId('created_by')->comment('relate to table:users, column:id');
            $table->dateTime('created_at');
            $table->foreignId('updated_by')->comment('relate to table:users, column:id');
            $table->dateTime('updated_at')->default(now('Asia/Jakarta'));
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_routes');
    }
};
