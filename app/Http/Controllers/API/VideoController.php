<?php

namespace App\Http\Controllers\API;

use App\VideoMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoInformation as VideoInformationRequest;
use App\Http\Requests\VideoPatchInformation as VideoPatchInformationRequest;

class VideoController extends Controller
{
    public function metaInfo(VideoInformationRequest $request)
    {
    	$meta = VideoMeta::where('video_id', $request->id)->first();
        if (is_null($meta)) {
            return response()->json(['message' => 'meta not found'], 404);
        }
	    return response()->json([
	    	'creatd_by' => $meta->video->user->name, 
	    	'size' => $meta->video_size,
	    	'views' => $meta->video_view
	    ]);
    }

    public function updateMeta(VideoPatchInformationRequest $request)
    {
    	$meta = VideoMeta::where('video_id', $request->id)->first();
    	if (is_null($meta)) {
    		return response()->json(['message' => 'meta not found'], 404);
    	}
    	$meta->video_size = $request->size;
    	$meta->video_view = $request->views;
    	$meta->save();
	    return response()->json([
	    	'creatd_by' => $meta->video->user->name, 
	    	'size' => $meta->video_size,
	    	'views' => $meta->video_view
	    ]);
    }
    
}
