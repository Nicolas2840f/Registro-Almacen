<nav class="border-solid border-b-2 w-full h-16 flex justify-start pl-2" style="background: white;">
    <a class="w-1/6" href="{{ route('mainView') }}">
        <img class="w-full h-full" src="/Imagenes/logo-NicoFer.png" alt="logo">
    </a>
    @if (!request()->routeIs('login', 'welcome', 'reset', 'register', 'password.reset', 'password.verify'))
        <x-layouts.nav />
        <div class="contenedor_menu select-none cursor-pointer flex items-center justify-center text-4xl menu">
        </div>
    @endif
</nav>
