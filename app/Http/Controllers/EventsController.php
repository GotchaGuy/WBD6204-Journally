<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
//    public function show($id)
//    {
//
//       $event =  Event::find($id);
//         return view("event", compact("event"));
//    }

    public function edit($id)
    {

        $event = Event::find($id);
        $event->timestamp = \Carbon\Carbon::parse($event->updated_at)->format('M d Y - l');
        return view("event-edit", compact("event"));
    }



}
