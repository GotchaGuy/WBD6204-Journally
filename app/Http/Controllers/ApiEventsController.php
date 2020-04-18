<?php

namespace App\Http\Controllers;

use App\Event;
use App\Status;
use Illuminate\Http\Request;

class ApiEventsController extends Controller
{
    public function index()
    {
        return Status::all();
    }

    public function store(Request $request)
    {
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
    }

    public function delete($id)
    {
        return Event::destroy($id);
    }
}
