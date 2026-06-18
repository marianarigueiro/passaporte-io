<section class="space-y-6">
    <header>
        <h2 class="text-xl font-semibold text-base-content">Alterar Senha</h2>
        <p class="mt-1 text-sm text-base-content/60">
            Use uma senha longa e aleatória para manter sua conta segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <div class="form-control gap-2">
            <label for="update_password_current_password" class="label-text font-medium">Senha atual</label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="input input-bordered w-full @error('current_password', 'updatePassword') input-error @enderror"
            >
            @error('current_password', 'updatePassword')
                <span class="text-error text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control gap-2">
            <label for="update_password_password" class="label-text font-medium">Nova senha</label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="input input-bordered w-full @error('password', 'updatePassword') input-error @enderror"
            >
            @error('password', 'updatePassword')
                <span class="text-error text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control gap-2">
            <label for="update_password_password_confirmation" class="label-text font-medium">Confirmar nova senha</label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="input input-bordered w-full @error('password_confirmation', 'updatePassword') input-error @enderror"
            >
            @error('password_confirmation', 'updatePassword')
                <span class="text-error text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary btn-sm shadow-md">Salvar</button>

            @if (session('status') === 'password-updated')
                <span
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success font-medium"
                >Senha atualizada.</span>
            @endif
        </div>
    </form>
</section>