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
            'image' => 'required|image',
        ]);
        // Store the uploaded image
        $imagePath = $request->file('image')->store('public/images');
        $imageUrl = asset(Storage::url($imagePath));
// dd($imageUrl);

        SearchImage::create([
            'user_id' => Auth::user()->id,
            'image' => $imageUrl
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
        $url= [ 'url' =>"https://dynamic-media-cdn.tripadvisor.com/media/photo-o/06/7e/7d/2c/pyramids-of-giza.jpg?w=1200&h=1200&s=1"];
        $response = Http::post('https://27b8-102-47-126-213.ngrok-free.app/image_search',$url,
        ['timeout' => 1500]);

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
