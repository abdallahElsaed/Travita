<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Survey;
use App\Models\Attraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TopRecommendtionController extends Controller
{

    public $url = 'https://e45d-156-198-56-17.ngrok-free.app/';
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $user= Auth::user();

        $survey =$user->surveys()->get()->mapWithKeys(function ($survey) {
            return [$survey->img_id => $survey->rate];
        });

        $response = Http::post($this->url .'recommendations', [
            'user_dict' => $survey
        ]
        , [
            'timeout' => 1500
        ]);
        $response = json_decode($response->body(), true);

        // dd($response);
        $places = [];
        foreach ($response['Top_N_Recommendations'] as $id => $rate) {
            $place = Attraction::where('id', $id)->get();

            $places[]=$rate;
            $places[]=$place;

        }
        return response()->json([
            $places
        ]);
    }
}
