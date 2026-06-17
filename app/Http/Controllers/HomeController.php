<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HomeController extends Controller
{
    public function index()
{
    $events = Event::query()
        ->latest()
        ->take(6)
        ->get();

    return view('home', compact('events'));
}
}