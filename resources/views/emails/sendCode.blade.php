<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body style="background: #075985">
    <div class="w-full flex justify-center text-center">
        <div class="table w-1/3 bg-sky-600 my-20 rounded-md shadow-xl shadow-slate-950/50">
            <h1 class="text-2xl font-semibold mb-4 mt-4 text-slate-50 tituloReset">Código de Restablecimiento</h1>
                <div class="w-full flex justify-center">
                    <input class="w-3/5 p-3 rounded-md mb-4 mt-4 focus:outline-none caja text-center" type="number"
                        value="{{ $resetCode }}" name="codigo" disabled>
                </div>
            </div>
        </div>
</body>

</html>
