<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['pt_description', 'en_description', 'mime', 'original_filename', 'filename', 'project_id'];

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
}
