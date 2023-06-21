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


        $response = Http::post('https://a402-41-232-35-195.ngrok-free.app/make-square',$place,
        ['timeout' => 700000]);

        $response = json_decode($response->body(), true);
        dd($response);

        // dd($response['Loc_box']['max_lat']);

        // $rest= Restaurant::whereBetween('latitude' ,[$response['Loc_box']['max_lat'],]);








    }
}
