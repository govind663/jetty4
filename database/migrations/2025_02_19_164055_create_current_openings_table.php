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
        Schema::create('current_openings', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->string('document_file')->nullable();
            $table->string('status')->nullable()->comment('1 => Active, 2 => Inactive');
            $table->integer('inserted_by')->nullable();
            $table->timestamp('inserted_at')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamp('modified_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_openings');
    }
};