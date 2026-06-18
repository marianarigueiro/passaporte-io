<section class="space-y-6">
    <header>
        <h2 class="text-xl font-semibold text-error">Excluir Conta</h2>
        <p class="mt-1 text-sm text-base-content/60">
            Depois que sua conta for excluída, todos os seus dados serão removidos permanentemente. Antes de prosseguir, faça o backup de qualquer informação importante.
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="btn btn-outline btn-error btn-sm"
    >
        Excluir conta
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-base-content">
                Tem certeza de que deseja excluir sua conta?
            </h2>

            <p class="text-sm text-base-content/60">
                Essa ação é irreversível. Todos os seus dados serão removidos permanentemente. Digite sua senha para confirmar.
            </p>

            <div class="form-control gap-2">
                <label for="password" class="label-text font-medium sr-only">Senha</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Sua senha"
                    class="input input-bordered w-full @error('password', 'userDeletion') input-error @enderror"
                >
                @error('password', 'userDeletion')
                    <span class="text-error text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="btn btn-ghost btn-sm">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-error btn-sm">
                    Excluir conta
                </button>
            </div>
        </form>
    </x-modal>
</section>