<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['first_name', 'last_name', 'birthday', 'sex', 'email', 'activity_id', 'country'];
}
