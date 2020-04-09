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
//        $request->merge(['user_id' => \Auth::user()->id]);
//      return  $event = Event::create($request->all());
        return $event = Event::create([
            'content' => $request->input('content'),
            'status_id' => $request->input('status_id'),
            'user_id' => \Auth::user()->id,
            'date' => $request->input('date'),
      ]);
    }

    public function update(Request $request, $id)
    {
        return Event::where('id', $id)->update([
            'content' => $request->input('content'),
            'status_id' => $request->input('status.id'),
        ]);

//        return redirect('/calendar');

    }

    public function delete($id)
    {
        return Event::destroy($id);

//        return redirect('/calendar');

    }
}
