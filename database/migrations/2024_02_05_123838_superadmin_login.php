<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('superadmin_login', function (Blueprint $table) {
            $table->id(); 
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->integer('type')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('superadmin_login');
    }
};
