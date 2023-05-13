<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $restaurant = $user->restaurants()->get();
        $hotel = $user->hotels()->get();
        $attraction = $user->attractions()->get();


        return response()->json([
            'data'=>[
                'Restaurant' => $restaurant,
                'Hotel' => $hotel,
                'Attraction' => $attraction
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'favoritable_id' => 'required',
            'favoritable_type' => 'required|in:Hotel,Restaurant,Attraction',
        ]);

        $user = Auth::guard('api')->user();
        $data=$request->all();

        $data['user_id'] = $user->id;
        $data['favoritable_id'] = $request->post('favoritable_id');
        $data['favoritable_type']= 'App\Models\\' . $request->input('favoritable_type');

        Favorite::create($data);

        return response()->json(['message' => 'Favorite added successfully.']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $type)
    {

    }
}
