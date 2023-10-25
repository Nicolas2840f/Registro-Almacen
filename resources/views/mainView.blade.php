<<<<<<< HEAD
<x-layouts.app>
    <p>Bienvenido, {{ Auth::user() }}</p>
</x-layouts.app>
=======
@auth
    {{ Auth::user()->nombreUsuarios }}
@endauth
@guest
asd
@endguest
>>>>>>> 3b1ead381db3ddf696fe737d41e1488fb9036a24
