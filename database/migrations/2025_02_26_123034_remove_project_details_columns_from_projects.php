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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'completed_project_details',
                'ongoing_project_details',
                'upcoming_project_details'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('completed_project_details')->nullable()->after('project_type_id');
            $table->text('ongoing_project_details')->nullable()->after('completed_project_details');
            $table->text('upcoming_project_details')->nullable()->after('ongoing_project_details');
        });
    }
};
