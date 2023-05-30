<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SurveyResource;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\V1\PlanResource;
use App\Models\Aiplan;
use App\Models\Attraction;
use App\Models\Survey;

use function PHPUnit\Framework\returnSelf;

class PlanController extends Controller
{
    public function showAllPlans(Aiplan $aiplan)
    {
        $user = Auth::user();
        $user_dict = $user->surveys()->get()->mapWithKeys(function ($survey) {
            return [$survey->img_id => $survey->rate];
        });

        $plans = Plan::select('city', 'longitude', 'latitude', 'days')->latest()->first();

        // Send the response to the AI model
        $response = Http::post('https://d02a-102-46-143-58.ngrok-free.app/make-ai', [
            'user_dict' => $user_dict,
            'city' => $plans->city,
            'longitude' => $plans->longitude,
            'latitude' => $plans->latitude,
            'days' => $plans->days,
        ], [
            'timeout' => 1500
        ]);

        // save response in aiPlan in DB 
        try {

            $data = new Aiplan();
            $user = Auth::user();
            $data->user_id = $user->id;
            $data->plan_data = $response->body();

            $data->save();
        } catch (\Throwable $th) {
            throw new \Exception('Error creating Ai Plan: ' . $th->getMessage());
        }

        $response = json_decode($response->body(), true);


        $plans = [];
        foreach ($response['plan'] as $days) {
            $day = []; // Initialize the $day array within the outer loop
            foreach ($days as $id) {
                $place = Attraction::where('id', $id)->get();
                $day[] = $place;
            }
            $plans[] = $day;
        }

    return response()->json(
            $plans,
            // $response
        );
    }

    public function storePlans(Request $request)
    {
        $request->validate([
            'city' => 'required | string',
            'days' => 'required | numeric',
            'price' => 'required | numeric',
            'latitude' => 'required | numeric',
            'longitude' => 'required | numeric',
        ]);

        $user = Auth::user();
        $data = $request->all();


        $data['user_id'] = $user->id;

        // dd($data);
        Plan::create($data);

        return response()->json(['message' => 'plan added successfully.']);
    }

    public function showSurveys()
    {

        $imgIds = [308825, 6206087, 472084, 321166, 1216558, 1432066];
        $survey = [];
        foreach ($imgIds as $id) {
            $survey[] = Attraction::where('id', $id)->get();
        }
        return response()->json([
            'survey' => $survey,
        ]);
    }

    public function storeSurveys(Request $request)
    {

        $request->validate([
            'img_id',
            'rate',
        ]);

        $user = Auth::user();
        $data = $request->all();

        $data['user_id'] = $user->id;

        Survey::create($data);

        return response()->json(['message' => 'Survey added successfully.']);
    }
}
