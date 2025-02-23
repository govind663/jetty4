<?php

use App\Models\Projects;
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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Projects::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('slug')->nullable();
            $table->text('image')->nullable();
            $table->string('built_up_area')->nullable();
            $table->string('it_load')->nullable();
            $table->string('developers')->nullable();
            $table->string('client_name')->nullable();
            $table->string('structural_consultant')->nullable();
            $table->string('architect')->nullable();
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
        Schema::dropIfExists('project_details');
    }
};
