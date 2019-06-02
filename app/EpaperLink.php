<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpaperLink extends Model
{
        protected $fillable = [
        'title',
        'image',
        'coordinate',
        'link',
        'map_id',
        'epaper_id',
        'extra1',
            ];

    public function epaper()
    {
        return $this->belongsTo('Apps\Epaper');
    }
}
