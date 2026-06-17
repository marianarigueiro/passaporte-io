<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function subscribe(Event $event)
{
    $user = Auth::user();

    if ($user->subscriptions()->where('event_id', $event->id)->exists()) {
        return back();
    }

    if ($event->participants()->count() >= $event->capacity) {
        return back()->with(
            'error',
            'Não há mais vagas disponíveis para este evento.'
        );
    }

    $user->subscriptions()->attach($event->id, [
        'ticket_code' => Str::upper(Str::random(10)),
        'status' => 'confirmed',
    ]);

    return back()->with(
        'success',
        'Inscrição realizada com sucesso.'
    );
}

    public function unsubscribe(Event $event)
    {
        Auth::user()
            ->subscriptions()
            ->detach($event->id);

        return back()->with('success', 'Inscrição cancelada.');
    }
}