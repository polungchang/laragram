<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    protected $fillable = [
        'bio', 'website'
    ];

    public function getImageAttribute($image)
    {
        if($image) {
            return "/storage/{$image}";
        } else {
            return 'https://cdn2.iconfinder.com/data/icons/business-finance-vol-1-53/30/Untitled-1-43-512.png';
        }
    }
    
    public function getWebsiteHref()
    {
        $url = $this->website;

        if(Str::contains($url, '//')) {
            return $url;
        } else {
            return "//{$url}";
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
