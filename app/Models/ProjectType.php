<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectType extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'project_type',
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

    // Define relationship with Projects model
    public function projects()
    {
        return $this->hasMany(Projects::class, 'project_type_id', 'id');
    }
}
