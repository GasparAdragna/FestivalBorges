<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = ['first_name', 'last_name', 'location', 'bio', 'photo', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    public function activity()
    {
        return $this->hasOne(Activity::class);
    }
}
