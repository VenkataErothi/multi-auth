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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->int('employeeID');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('start_date');
            $table->string('skills');
            $table->timestamp('created_at')->foreignId('user_name');
            $table->timestamp('updated_at');
            $table->timestamp('created_by');
            $table->timestamp('updated_by');
            $table->timestamps();
            $table->foreignId('user_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
