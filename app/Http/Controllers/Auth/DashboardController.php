<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard', [
            // eventos criados pelo usuário
            'myEventsCount' => Event::where('user_id', $user->id)->count(),

            // inscrições do usuário
            'subscriptionsCount' => $user->subscriptions()->count(),

            // próximos eventos
            'upcomingCount' => Event::where('date_time', '>=', now())->count(),
        ]);
    }
}