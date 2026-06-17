<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['category', 'organizer'])->get();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('events.create', compact('categories'));
    }

    public function store(StoreEventRequest $request)
    {
        $bannerPath = $request->file('banner')
            ->store('events', 'public');

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date_time' => $request->date_time,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'banner_path' => $bannerPath,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('events.index')
            ->with('success', 'Evento criado com sucesso.');
    }

    public function show(Event $event)
    {
        $event->load(['category', 'organizer']);

        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
{
    if ($event->user_id !== Auth::id()) {
        abort(403);
    }

    $categories = Category::all();

    return view('events.edit', compact('event', 'categories'));
}

    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->validated();

        if ($event->user_id !== Auth::id()) {
    abort(403);
}

        if ($request->hasFile('banner')) {

            if ($event->banner_path) {
                Storage::disk('public')
                    ->delete($event->banner_path);
            }

            $data['banner_path'] = $request
                ->file('banner')
                ->store('events', 'public');
        }

        unset($data['banner']);

        $event->update($data);

        return redirect()
            ->route('events.show', $event)
            ->with('success', 'Evento atualizado com sucesso.');
    }

        public function destroy(Event $event)
{
    if ($event->user_id !== Auth::id()) {
        abort(403);
    }

    if ($event->banner_path) {
        Storage::disk('public')->delete($event->banner_path);
    }

    Event::destroy($event->id);

    return redirect()
        ->route('events.index')
        ->with('success', 'Evento removido com sucesso.');
}
}