<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class CalendarController extends Controller
{
    public function index()
    {
        function monthYear($var) {
          return date("F Y", time($var));
        }
         function day($var) {
          return date("j", time($var));
        }


        $events = Event::with('user', 'status')->orderBy('created_at', 'desc')->get();
//        dd(json_encode($events, JSON_PRETTY_PRINT));
        $dates = $events->groupBy(function ($item, $key) {
//            dd(json_encode($item, JSON_PRETTY_PRINT));
            return $item->date;
            //treats the name string as an array
        })
            ->sortBy(function ($item, $key) {      //sorts A-Z at the top level
                return $key;
            });

        $ordered = array();
        foreach ($dates as $key => $date) {
            $key = monthYear($key);
            $ordered[$key] = $key;
            foreach ($date as $eventData) {
                if (monthYear($eventData->date) == monthYear($key)) {
                    $ordered[$key][day($eventData->date)] = $eventData;
                }
            }
        }
            dd(json_encode($ordered, JSON_PRETTY_PRINT));



//        dd(json_encode($grouped, JSON_PRETTY_PRINT));

        return view('calendar', compact('grouped'));
    }
}
