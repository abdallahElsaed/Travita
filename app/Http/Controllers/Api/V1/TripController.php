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

    public function showPlaces(Request $request)
    {

        $user = Auth::user();
// dd($request->input('trip_id'));
        $restaurant = $user->restaurantsTrip()
                    ->select('trip_id','image','name','address','latitude','longitude','phone','numberOfReviews','reviewTags','ranking_in_city','rating','website','email','cuisine','dietaryRestrictions')
                    ->where('trip_id','=',(int) $request->input('trip_id'))->distinct()->get();

        $hotel = $user->hotelsTrip()
                        ->select('trip_id','name','image','address','latitude','longitude','phone','priceRange','numberOfReviews','hotelClass','reviewTags','ranking_in_city','rating','website','email')
                        ->where('trip_id','=', $request->input('trip_id'))->distinct()->get();

        $attraction = $user->attractionsTrip()
                    ->select('trip_id','name','image','address','latitude','longitude','phone','num_reviews','location_string','ranking','rating','website','email','description','subcategory','subtype','ranking_in_city')
                    ->where('trip_id','=', (int)$request->input('trip_id'))->distinct()->get();



        return response()->json([
            'data'=>[
                'Restaurant' => $restaurant,
                'Hotel' => $hotel,
                'Attraction' => $attraction
            ]
        ]);
    }
}
