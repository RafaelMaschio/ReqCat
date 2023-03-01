<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementSuggestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'requirement_types_id', 'title', 'description', 'motivated_for'
    ];

    public function type() {

        return $this->hasOne(RequirementType::class, 'id' ,'requirement_types_id');
    }
}
