<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard', [
            // eventos criados pelo usuário logado
            'myEventsCount' => Event::where('user_id', $user->id)->count(),

            // inscrições do usuário
            'subscriptionsCount' => $user->subscriptions()->count(),

            // eventos futuros reais
            'upcomingCount' => Event::where('date_time', '>=', Carbon::now())->count(),
        ]);
    }
}