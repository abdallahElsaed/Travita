<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// attractions data
// Route::get('/', function () {
//     $data =  file_get_contents('/home/elsaed/Desktop/travita_data/attractions_be.json');

//     $array = json_decode($data, true);
//     $result = [];

//     foreach ($array['id'] as $key => $value) {
//         $item = [
//             "id" =>$value,
//             "name" => $array['name'][$key],
//             "image" => $array['image'][$key],
//             "address" => $array['address'][$key],
//             "latitude" => $array['latitude'][$key],
//             "longitude" => $array['longitude'][$key],
//             "phone" => $array['phone'][$key],
//             "email" => $array['email'][$key],
//             "website" => $array['website'][$key],
//             "rating" => $array['rating'][$key],
//             "ranking_in_city" => $array['ranking_in_city'][$key],
//             "ranking" => $array['ranking'][$key],
//             "num_reviews" =>  $array['num_reviews'][$key],
//             "location_string" => $array['location_string'][$key],
//             "description" => $array['description'][$key],
//             "subcategory" => $array['subcategory'][$key],
//             "subtype" => $array['subtype'][$key],

//         ];
//         $result[] = $item;
//     }

//     $result_json = json_encode($result);

//     echo $result_json;
// });


// attraction_hours data
// Route::get('/', function () {
//     $data =  file_get_contents('/home/elsaed/Desktop/travita_data/attractions_hours.json');

//     $array = json_decode($data, true);
//     $result = [];

//     foreach ($array['id'] as $key => $value) {
//         $item = [
//             "attraction_id" =>$array['id'][$key],
//             "day1" => $array['day1'][$key],
//             "day2" => $array['day2'][$key],
//             "day3" => $array['day3'][$key],
//             "day4" => $array['day4'][$key],
//             "day5" => $array['day5'][$key],
//             "day6" => $array['day6'][$key],
//             "day7" => $array['day7'][$key],

//         ];
//         $result[] = $item;
//     }

//     $result_json = json_encode($result);

//     echo $result_json;
// });
