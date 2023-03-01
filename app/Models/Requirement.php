<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'requirement_types_id', 'project_id', 'title', 'description'
    ];

    public function type() {

        return $this->hasOne(RequirementType::class, 'id' ,'requirement_types_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
