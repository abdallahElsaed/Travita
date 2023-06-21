<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Attraction;
use App\Models\SearchImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class SearchImageController extends Controller
{

    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

// dd($request->input('image'));


        SearchImage::create([
            'user_id' => Auth::user()->id,
            'image' =>$request->input('image'),
        ]);

        return response()->json([
            'message' => 'Image stored successfully'
        ]);
    }

    public function searchResult()
    {
        $user = Auth::user();
        $image = SearchImage::select('image')->where('user_id', $user->id)->latest()->first();
        // $image_path= json_decode($image, true)

        // dd($image->image);
        $url= [ 'url' =>$image->image];
        $response = Http::post('https://27e9-41-232-35-195.ngrok-free.app/image_search',$url,
        ['timeout' => 700000]);

        // dd($response->body());


        $response = json_decode($response->body(), true);
        // dd($response);

        $search_result = [];
        foreach ($response as $id) {

            $place = Attraction::where('id', $id)->get();
            $search_result[] = $place;
        }

        return response()->json([
            $search_result
        ]);
    }
}
