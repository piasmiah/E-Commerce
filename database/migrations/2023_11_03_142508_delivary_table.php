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
        Schema::create('delivary', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('address', 100);
            $table->string('phone', 11)->unique();
            $table->string('email', 20)->unique();
            $table->string('nid', 10)->unique();
            $table->string('password', 8);
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
