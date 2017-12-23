<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model
{
    protected $fillable = ['mime', 'original_filename', 'filename'];
}
