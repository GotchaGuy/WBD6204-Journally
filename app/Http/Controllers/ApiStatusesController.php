<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class ApiStatusesController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return $statuses;
    }
}
