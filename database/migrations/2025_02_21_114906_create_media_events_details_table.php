<?php

use App\Models\MediaEvents;
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
        Schema::create('media_events_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MediaEvents::class)->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('slug')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->text('event_gallery_images')->nullable();
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
        Schema::dropIfExists('media_events_details');
    }
};
