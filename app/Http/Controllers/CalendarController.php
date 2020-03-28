<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class CalendarController extends Controller
{
    public function index()
    {

        $events = Event::with('user', 'status')->orderBy('created_at', 'desc')->get();
//        dd(json_encode($events));
//        $grouped = $events->groupBy(function ($item, $key) {
//            return $item->name[0];     //treats the name string as an array
//        })
//            ->sortBy(function ($item, $key) {      //sorts A-Z at the top level
//                return $key;
//            });
//            dd($grouped);

        return view('calendar', compact('events'));
    }
}
