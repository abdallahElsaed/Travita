<?php

namespace App\Http\Controllers\Api\V1;

use App\Filter\V1\RestaurantFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

            $filter = new RestaurantFilter();

            $filterItem = $filter->transform($request);

            $attraction= Restaurant::where($filterItem);


            return RestaurantResource::collection($attraction->get()); //[['column' ,'operators' , 'value']]


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
