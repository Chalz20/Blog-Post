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
        Schema::create('permissions_roles', function (Blueprint $table) {
            $table->primary(['permissions_id','roles_id']);
            $table->foreignId('permissions_id')->constrained()->onDelete('cascade');
            $table->foreignId('roles_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions_roles');
    }
};
