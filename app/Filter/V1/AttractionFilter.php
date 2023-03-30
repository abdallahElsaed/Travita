<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;


class AttractionFilter extends ApiFilter
{
    protected $safeParams = [
        'subtype' => ['li'],
        'num_reviews' => ['eq' , 'gt' , 'lt' ,'gte' , 'lte'],
        'rating' => ['eq' , 'gt' , 'lt' ,'gte' , 'lte'],
        'location_string' => ['li'],

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
