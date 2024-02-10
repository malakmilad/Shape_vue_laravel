<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use Illuminate\Http\Response;

class ActivityController extends Controller
{
    public function saveActivity(StoreActivityRequest $request)
    {

        $activity=Activity::create([
            'background_id'=>$request->background_id,
            'shapes'=>$request->shapes
        ]);
        return new Response(['status' => true, 'message' => 'Successfully uploaded', 'data' => new ActivityResource($activity)], 200);

    }
}
