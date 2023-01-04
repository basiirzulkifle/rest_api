<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\PropObject;
use App\Models\BestScore;
use App\Http\Resources\PropObject as PropResource;

class PropObjectController extends BaseController
{

    public function index()
    {
        $propoject = PropObject::all();
        return $this->sendResponse(PropResource::collection($propoject), 'PropObject fetched.');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $input = $request->all();
        $validator = Validator::make($input, [
            'object_id' => 'required',
            'object_name' => 'required',
            'object_value' => 'required',
            'object_location' => 'required',
            'user_id' => 'required',

        ]);

        $user_id = $request->input('user_id');
        $object_value = $request->input('object_value');



        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $propoject = PropObject::create($input);

//      $best_score = BestSCore::create();
        $best_score = new BestScore();
        $best_score->user_id = $user_id;
        $best_score->best_score_value = $object_value;

        $best_score->save();


        return $this->sendResponse(new PropResource($propoject), 'PropObject created.');
    }

    public function show($id)
    {
        $propoject = PropObject::find($id);
        if (is_null($propoject)) {
            return $this->sendError('PropObject does not exist.');
        }
        return $this->sendResponse(new PropResource($propoject), 'PropObject fetched.');
    }

    public function update(Request $request, PropObject $propoject)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'object_id' => 'object_id',
            'object_name' => 'object_name',
            'object_value' => 'object_value',
            'object_location' => 'object_location',

        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $propoject->object_id = $input['object_id'];
        $propoject->object_name = $input['object_name'];
        $propoject->object_value = $input['object_value'];
        $propoject->object_location = $input['object_location'];
        $propoject->save();

        return $this->sendResponse(new PropResource($propoject), 'PropObject updated.');
    }

    public function destroy(PropObject $propoject)
    {
        $propoject->delete();
        return $this->sendResponse([], 'PropObject deleted.');
    }
}
