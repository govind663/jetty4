<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaEventsDetails extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',        
        'media_events_id',
        'slug',
        'image',
        'description',
        'event_gallery_images',
        'status',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = [
        'inserted_at',
        'modified_at',
        'deleted_at',
    ];

    // ===== Relationship between  MediaEvents
    public function mediaEvents()
    {
        return $this->belongsTo(MediaEvents::class, 'media_events_id', 'id');
    }
}
