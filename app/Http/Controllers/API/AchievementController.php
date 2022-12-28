<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Achievement;
use App\Http\Resources\Achievement as AchievementResource;
   
class AchievementController extends BaseController
{
    public function index()
    {
        $achievements = Achievement::all();
        return $this->sendResponse(AchievementResource::collection($achievements), 'Achievements fetched.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $achievement = Achievement::create($input);
        return $this->sendResponse(new AchievementResource($achievement), 'Achievement created.');
    }
   
    public function show($id)
    {
        $achievement = Achievement::find($id);
        if (is_null($achievement)) {
            return $this->sendError('Achievement does not exist.');
        }
        return $this->sendResponse(new AchievementResource($achievement), 'Achievement fetched.');
    }
    
    public function update(Request $request, Achievement $achievement)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $achievement->title = $input['title'];
        $achievement->description = $input['description'];
        $achievement->save();
        
        return $this->sendResponse(new AchievementResource($achievement), 'Achievement updated.');
    }
   
    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return $this->sendResponse([], 'Achievement deleted.');
    }
}