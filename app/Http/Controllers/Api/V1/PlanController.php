<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PlanController extends Controller
{
    public function showAllPlans(){
        $user = Auth::user();
        $plans = $user->plans()->get();
        return response()->json([
            'data'=>$plans
        ]);
    }

    public function storePlans(Request $request){
        $request->validate([
            'city' => 'required | string',
            'days' => 'required | numeric',
            'price' => 'required | numeric',
            'latitude' => 'required | numeric',
            'longitude' => 'required | numeric',
        ]);

        $user = Auth::user();
        $data=$request->all();


        $data['user_id'] = $user->id;

        // dd($data);
        Plan::create($data);

        return response()->json(['message' => 'Favorite added successfully.']);
    }
}
