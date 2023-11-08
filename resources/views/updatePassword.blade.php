<x-layouts.app title="Update">
    <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="Password" placeholder="Contraseña"
        name="password">
    @error('password')
        <div>
            {{ $message }}
        </div>
    @enderror
    <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="Password" placeholder="confirmar contraseña"
        name="password_confirmation">
</x-layouts.app>
