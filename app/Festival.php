<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $table = "festivals";
    protected $fillable = ['name', 'active'];
}
