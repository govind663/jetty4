<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectDetails extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'projects_id',
        'project_slug',
        'image',
        'built_up_area',
        'it_load',
        'developers',
        'client_name',
        'structural_consultant',
        'architect',
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

    // ==== Relationship with Projects
    public function projectName()
    {
        return $this->belongsTo(Projects::class, 'projects_id');
    }   
}
