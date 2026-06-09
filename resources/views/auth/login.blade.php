<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso - MedicSW</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-sky-700 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-sm bg-white rounded-3xl shadow-2xl p-8">
        <div class="text-center mb-8">
            <div class="bg-sky-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-heart-pulse text-3xl text-sky-600"></i>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">MedicSW</h1>
            <p class="text-slate-500 text-sm">Sistema Clínico</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 text-red-600 text-xs p-3 rounded-lg mb-4 border border-red-200">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Correo</label>
                <input type="email" name="email" required 
                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-sky-500 outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Contraseña</label>
                <input type="password" name="password" required 
                       class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-sky-500 outline-none">
            </div>

            <button type="submit" 
                    class="w-full bg-sky-600 hover:bg-sky-700 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-sky-200">
                Entrar al Sistema
            </button>
        </form>
    </div>

</body>
</html>