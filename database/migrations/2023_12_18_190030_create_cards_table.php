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
        Schema::create('cards', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('set_id');
            $table->string('name')->unique();
            $table->string('lang');
            $table->string('mana_cost')->nullable();
            $table->unsignedInteger('cmc')->nullable();
            $table->string('power')->nullable();
            $table->string('toughness')->nullable();
            $table->string('type_line')->nullable();
            $table->text('oracle_text')->nullable();
            $table->text('flavor_text')->nullable();
            $table->string('layout');
            $table->timestamp('released_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
