<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = "activities";
    protected $fillable = ['name', 'description', 'speaker', 'date', 'activity', 'speaker_id'];

    public function speakerModel()
    {
        return $this->belongsTo('App\Speaker', 'speaker_id');
    }
    public function festival()
    {
        return $this->belongsTo('App\Festival', 'festival_id');
    }
}
