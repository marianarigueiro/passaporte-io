<nav class="navbar bg-base-100/90 backdrop-blur-md border-b border-base-200 fixed top-0 z-50 h-16 px-4 sm:px-6">
    {{-- O conteúdo permanece o mesmo; apenas certifique-se de que a altura seja consistente (h-16) --}}
    <div class="navbar-start">
        <a href="{{ route('home') }}" class="flex items-center gap-2 group">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center shadow-lg shadow-primary/20 group-hover:shadow-primary/40 transition-shadow">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
            </div>
            <span class="font-bold text-lg tracking-tight text-base-content">
                Passaporte<span class="text-primary">.io</span>
            </span>
        </a>
    </div>

    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-0 gap-1">
            <li>
                <a href="{{ route('home') }}" class="text-sm font-medium rounded-lg {{ request()->routeIs('home') ? 'text-primary bg-primary/10' : 'text-base-content/60 hover:text-base-content hover:bg-base-200' }}">
                    Início
                </a>
            </li>
            <li>
                <a href="{{ route('events.index') }}" class="text-sm font-medium rounded-lg {{ request()->routeIs('events.*') ? 'text-primary bg-primary/10' : 'text-base-content/60 hover:text-base-content hover:bg-base-200' }}">
                    Eventos
                </a>
            </li>
        </ul>
    </div>

    <div class="navbar-end gap-2">
        @auth
            {{-- Dropdown do usuário (mantido igual) --}}
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-sm gap-2 font-medium">
                    <div class="avatar placeholder">
                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-primary to-secondary text-white text-xs font-bold">
                            <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                        </div>
                    </div>
                    <span class="hidden sm:block text-sm">{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                <ul tabindex="0" class="dropdown-content menu bg-base-200 rounded-xl z-50 w-56 p-2 shadow-2xl border border-base-100 mt-2">
                    <li class="menu-title">
                        <span class="text-xs text-base-content/40 font-semibold uppercase tracking-widest">
                            {{ Auth::user()->role === 'organizer' ? 'Organizador' : 'Participante' }}
                        </span>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Meu perfil
                        </a>
                    </li>
                    @if(Auth::user()->role === 'organizer')
                    <li>
                        <a href="{{ route('events.create') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            Criar evento
                        </a>
                    </li>
                    @endif
                    <li class="border-t border-base-100 mt-1 pt-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-lg text-error hover:bg-error/10 transition-colors">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Sair
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="btn btn-ghost btn-sm text-sm font-medium">Entrar</a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-sm text-sm font-medium shadow-lg shadow-primary/20">Criar conta</a>
        @endguest
    </div>
</nav>