<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Http;

class RestaurantSquareController extends Controller
{
    public function restaurantSquare(Request $request){
        $request->validate([
            'place_id' => 'required',
        ]);


        $place=[
            'place_id' =>$request->input('place_id'),
        ];


        $response = Http::post('https://6966-41-232-35-195.ngrok-free.app/make-square',$place,
        ['timeout' => 700000]);

        $response = json_decode($response->body(), true);
        // dd($response);

        $max_lat=$response['Loc_box']['max_lat'];
        $min_lat=$response['Loc_box']['min_lat'];
        $max_lon=$response['Loc_box']['max_lon'];
        $min_lon=$response['Loc_box']['min_lon']  ;

        $rest= Restaurant::whereBetween('latitude' ,[$min_lat , $max_lat])
                        ->whereBetween('longitude' ,[$min_lon,$max_lon])->get();
            // dd($rest);
        return response()->json([
            $rest,
        ]);








    }
}
