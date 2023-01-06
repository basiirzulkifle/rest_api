<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\GetAchievement;
use App\Http\Resources\GetAchievement as GetAchievementResource;
use Illuminate\Support\Facades\DB;

class GetAchievementController extends BaseController
{
    public function index()
    {
        $getachievement = GetAchievement::all();
        return $this->sendResponse(GetAchievementResource::collection($getachievement), 'Get Leaderboard fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id' => 'required',
            'achievement_id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $achievement = GetAchievement::create($input);
        return $this->sendResponse(new GetAchievementResource($achievement), 'Achievement created.');
    }

    public function show($user_id)
    {
        $achievement = DB::table('link_user_achievement')
            ->select('*')
            ->where('user_id', '=', $user_id)
            ->get();

        if (is_null($achievement)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse($achievement, 'Post fetched.');
    }

    public function update(Request $request, GetAchievementController $getAchievement)
    {
    }

    public function destroy(GetAchievementController $getAchievement)
    {
    }
}
