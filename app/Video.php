<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	protected $table = 'videos';
    //
    protected $fillable = ['title'];

    public function videometa()
    {
        return $this->hasOne(VideoMeta::class, 'video_id', 'video_metas');
    }

    public function user() 
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}

