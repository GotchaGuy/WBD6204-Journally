<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ApiCalendarController extends Controller
{
    public function index()
    {

        $events = Event::with('user', 'status')->orderBy('created_at', 'desc')->get();
        $dates = $events->groupBy(function ($item, $key) {
            return \Carbon\Carbon::parse($item->date)->format('Y-m-d');
        })
            ->sortBy(function ($item, $key) {
                return $key;
            });

        return $dates;
    }
}
