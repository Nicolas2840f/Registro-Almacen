<x-layouts.app
title="Recuperar Contraseña"
>
<body style="background: #f8fafc">
    <nav class="border-solid border-b-2 w-full flex justify-start pl-2" style="background: white;"><img class="w-1/6" src="/Imagenes/logo-NicoFer.png" alt="logo"></nav>
    <div class="w-full flex justify-center align-center text-center">
        <div class="w-1/3 border-solid border-2 border-zinc-200 m-20" style="background: white;">
            <div class="w-full flex justify-center"><img class="w-1/4 m-4" src="/Imagenes/candado.png" alt="candado"></div>
            <h1 class="text-2xl font-semibold m-2">¿Tienes problemas para Iniciar Sesión?</h1>
            <div class="text-zinc-600 m-2"> 
                <p>Ingresa tu correo electrónico</p>
                <p>y te enviaremos un enlace</p>
                <p>para que recuperes el acceso a tu cuenta</p>
            </div>
            <div class="w-full flex justify-center">
               <form action="">
                <input class="w-4/5 m-2 bg-stone-200 p-2 rounded-md border-solid border-2 border-stone-300 text-center focus:outline-none caja2" type="text" placeholder="Ingresa tu correo electrónico">
                <button class="w-4/5 m-2 bg-sky-500 text-slate-50 p-1 rounded-md font-semibold hover:bg-sky-600">Enviar enlace de inicio de sesión</button>  
            </form> 
            </div>
            
            
            <p>---------------o---------------</p>
            <a href="#">Crear cuenta nueva</a>
            <a href="#">Volver al inicio de sesión</a>
        </div>
    </div>
</body>

</x-layouts.app>