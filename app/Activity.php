<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = "activities";
    protected $fillable = ['name', 'description', 'speaker', 'date', 'activity'];
}