<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('otpverfication', function (Blueprint $table) {
            $table->id(); 
            $table->integer('otp_code')->nullable();
            $table->timestamp('otp_expires_at')->nullable();
            $table->string('user')->nullable();
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('otpverfication');
    }
};
