<section class="space-y-6">
    <header>
        <h2 class="text-xl font-semibold text-base-content">Informações do Perfil</h2>
        <p class="mt-1 text-sm text-base-content/60">
            Atualize o nome e o e‑mail da sua conta.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        {{-- Nome --}}
        <div class="form-control gap-2">
            <label for="name" class="label-text font-medium">Nome</label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="input input-bordered w-full @error('name') input-error @enderror"
            >
            @error('name')
                <span class="text-error text-xs">{{ $message }}</span>
            @enderror
        </div>

        {{-- E‑mail --}}
        <div class="form-control gap-2">
            <label for="email" class="label-text font-medium">E‑mail</label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="input input-bordered w-full @error('email') input-error @enderror"
            >
            @error('email')
                <span class="text-error text-xs">{{ $message }}</span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 rounded-lg bg-warning/10 border border-warning/30">
                    <p class="text-sm text-warning-content/80">
                        Seu e‑mail ainda não foi verificado.

                        <button form="send-verification" class="underline font-medium text-warning hover:text-warning-focus transition-colors">
                            Clique aqui para reenviar o e‑mail de verificação.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-success">
                            Um novo link de verificação foi enviado para o seu e‑mail.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary btn-sm shadow-md">Salvar</button>

            @if (session('status') === 'profile-updated')
                <span
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success font-medium"
                >Salvo.</span>
            @endif
        </div>
    </form>
</section>