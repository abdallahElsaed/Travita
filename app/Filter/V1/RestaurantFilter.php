<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;

class RestaurantFilter extends ApiFilter
{
    protected $safeParams = [
        'numberOfReviews' => ['eq' , 'gt' , 'lt' ,'gte' , 'lte'],
        'address' => ['li'],
        'dietaryRestrictions' => ['li'],
        'rating' => ['eq' , 'gt' , 'lt' ,'gte' , 'lte'],


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
