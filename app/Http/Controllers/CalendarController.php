<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class CalendarController extends Controller
{
    public function index()
    {
        function monthYear($var)
        {
            return date("F Y", time($var));
        }

        function day($var)
        {
            return date("j", time($var));
        }


        $events = Event::with('user', 'status')->orderBy('created_at', 'desc')->get();
        $grouped = $events;
//        $dates = $events->groupBy(function ($item, $key) {
//            return $item->date;
//            //treats the name string as an array
//        })
//            ->sortBy(function ($item, $key) {      //sorts A-Z at the top level
//                return $key;
//            });
//  dd(json_encode($dates, JSON_PRETTY_PRINT));
//
//        $grouped = array();
//        foreach ($events as $event) {
//            if(!isset($grouped[monthYear($event->date)])) {
//                $grouped[monthYear($event->date)][day($event->date)] = $event;
//            }
//            $grouped[] = monthYear($event->date);
//        }

//        $events1 = $events;
//        foreach ($events1 as $event1) {
//            $event1->date = monthYear($event1->date);
//        }
//        $grouped = $events1->groupBy(function ($item, $key) {
//            return $item->date;
//        });
//        dd(json_encode($grouped, JSON_PRETTY_PRINT));

        return view('calendar', compact('grouped'));
    }
}
