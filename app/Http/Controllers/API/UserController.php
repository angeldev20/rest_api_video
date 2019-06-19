<?php

namespace App\Http\Controllers\API;

use App\Video;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetTotalVideoSizeByUser as GetTotalVideoSizeByUserRequest;

class UserController extends Controller
{
    public function totalVideoSize(GetTotalVideoSizeByUserRequest $request)
    {
    	$user = User::where('name', $request->user_name)->first();
    	if (is_null($user)) {
            return response()->json(['message' => 'User not found'], 404);
        }
    	return Video::where('user_id', $user->id)
	    	->leftJoin('video_metas', 'videos.id', '=', 'video_metas.video_id')
	    	// ->get();
	    	->sum('video_metas.video_size');
	    
    }
}

