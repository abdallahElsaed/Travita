<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;

class HotelFilter extends ApiFilter
{
    protected $safeParams = [
        'numberOfReviews' => ['eq' , 'gt' , 'lt' ,'gte' , 'lte'],
        'address' => ['li'],
        'rating' => ['eq' , 'gt' , 'lt' ,'gte' , 'lte'],
        'hotelClass' =>  ['eq' , 'gt' , 'lt' ,'gte' , 'lte'],

    ];



    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'li' => 'LIKE',
    ];


}
