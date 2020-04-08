<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class ApiEventsController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        return $statuses;
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => \Auth::user()->id]);
        $event = Event::create($request->all());
        return $event;
    }
}
