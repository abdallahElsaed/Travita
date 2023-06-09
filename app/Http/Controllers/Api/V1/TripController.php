<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Models\Tripplace;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function storeTrip( Request $request , Trip $trip)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $user=Auth::user();
        $data=$request->all();
        $data['user_id'] =$user->id;
        // dd($data);

        $trip->fill($data)->save();

        return response()->json([
            'message'=>'Your Trip Added Successfully'
        ]);

    }

    public function showTrips()
    {
        $user=Auth::user();
        $trips=Trip::where('user_id',$user->id)->get();

        return response()->json([
            'trips'=>$trips
        ]);
    }

    public function storePlaces(Request $request)
    {
        $request->validate([
            'trip_id' => 'required',
            'trippable_id' => 'required',
            'trippable_type' => 'required|in:Hotel,Restaurant,Attraction',

        ]);

        $user=Auth::user();
        $data=$request->all();
        $data['user_id'] =$user->id;
        $data['trippable_type']= 'App\Models\\' . $request->input('trippable_type');

        Tripplace::create($data);

        return response()->json([
            'message'=>'Your Places Added Successfully'
        ]);
    }

    public function showPlaces()
    {
        $user = Auth::user();

        $restaurant = $user->restaurantsTrip()->distinct()->get();
        $hotel = $user->hotelsTrip()->distinct()->get();
        $attraction = $user->attractionsTrip()->distinct()->get();


        return response()->json([
            'data'=>[
                'Restaurant' => $restaurant,
                'Hotel' => $hotel,
                'Attraction' => $attraction
            ]
        ]);
    }
}
