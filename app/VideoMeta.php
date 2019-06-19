<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoMeta extends Model
{
	protected $table = 'video_metas';
    //
    protected $fillable = ['video_id', 'video_size', 'video_view'];

    public function video() 
    {
    	return $this->belongsTo('App\Video', 'video_id');
    }
}
