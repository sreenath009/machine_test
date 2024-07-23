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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('department');
            $table->unsignedBigInteger('designation');
            $table->string('phone_number');
            $table->timestamps();
            $table->foreign('department')->references('id')->on('departments');
            $table->foreign('designation')->references('id')->on('designations');
        });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::dropIfExists('departments');
        Schema::dropIfExists('designations');
        Schema::dropIfExists('users');
    }
};
