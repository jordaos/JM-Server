<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'technologies', 'photos'];

    public function images() {
        return $this->hasMany('App\Image', 'project_id');
    }
}
