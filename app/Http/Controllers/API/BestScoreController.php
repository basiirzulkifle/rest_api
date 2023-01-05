<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\BestScore;
use App\Http\Resources\BestScore as BestScoreResource;

class BestScoreController extends BaseController
{
    public function index()
    {
        $sums = DB::table('best_score')
            ->select(DB::raw('sum(best_score.best_score_value) as sum , best_score.user_id, user.username as username'))
            ->groupBy('user_id')
            ->orderBy('sum', 'desc')
            ->join('users', 'users.user_id', '=', 'best_score.user_id')
            ->get();
        return $this->sendResponse($sums, 'Best Score fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = BestScore::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $bestscore = BestScore::create($input);
        return $this->sendResponse(new BestScoreResource($bestscore), 'Best Score created.');
    }

    public function show($id)
    {
    }

    public function update(Request $request, Achievement $achievement)
    {
    }

    public function destroy(Achievement $achievement)
    {
    }
}
