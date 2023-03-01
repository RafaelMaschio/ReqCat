<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'description', 'motivado_por', 'title'
    ];

    
    public function users() {

        return $this->belongsToMany(User::class);
    }

    public function requirements() {

        return $this->hasMany(Requirement::class);
    }
}
