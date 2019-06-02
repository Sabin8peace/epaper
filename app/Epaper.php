<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Epaper extends Model
{
     protected $fillable = [
        'title',
        'image',
        'datetime',
        'is_publish',
        'extra1',
        'map_id',
       'created_by',
       'updated_by',
    ];
    public function epaperLinks()
    {
        return $this->hasMany('App\EpaperLink');
    }
}
