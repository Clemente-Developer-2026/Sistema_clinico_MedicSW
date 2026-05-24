<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Clínico - MedicSW</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans flex h-screen overflow-hidden">

    <aside class="w-64 bg-sky-600 text-white flex flex-col justify-between shadow-xl">
        <div>
            <div class="p-5 flex items-center gap-3 bg-sky-700">
                <i class="fa-solid fa-heart-pulse text-2xl"></i>
                <span class="font-bold text-lg tracking-wider">MedicSW</span>
            </div>
            
            <nav class="mt-6 px-4 space-y-2">
    <p class="text-xs font-semibold text-sky-200 uppercase px-2 mb-2 tracking-wider">Vista</p>
    
    <a href="/medicos" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 ease-in-out transform hover:bg-sky-500/50 hover:translate-x-1 group {{ Request::is('medicos*') ? 'bg-sky-500 font-semibold shadow-md' : '' }}">
        <i class="fa-solid fa-user-doctor w-5 transition-transform duration-300 group-hover:scale-110"></i> 
        <span>Gestión de Médicos</span>
    </a>
    
    <a href="/horarios" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 ease-in-out transform hover:bg-sky-500/50 hover:translate-x-1 group {{ Request::is('horarios*') ? 'bg-sky-500 font-semibold shadow-md' : '' }}">
        <i class="fa-solid fa-calendar-clock w-5 transition-transform duration-300 group-hover:scale-110"></i> 
        <span>Horarios de Atención</span>
    </a>
    
    <a href="/historiales" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 ease-in-out transform hover:bg-sky-500/50 hover:translate-x-1 group {{ Request::is('historiales*') ? 'bg-sky-500 font-semibold shadow-md' : '' }}">
        <i class="fa-solid fa-file-medical w-5 transition-transform duration-300 group-hover:scale-110"></i> 
        <span>Historial Clínico</span>
    </a>
</nav>
        </div>

        <div class="p-4 border-t border-sky-500 bg-sky-700 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-sky-500 flex items-center justify-center font-bold">J</div>
                <span class="text-sm font-medium">Dr. prueba</span>
            </div>
            <a href="#" class="text-sky-200 hover:text-white"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-y-auto">
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center shrink-0">
            <h1 class="text-xl font-bold text-slate-700">@yield('modulo_titulo', 'Panel de Control')</h1>
            <span class="text-sm text-slate-500">{{ date('d/m/Y') }}</span>
        </header>

        <div class="p-8 flex-1">
            @yield('contenido')
        </div>
    </main>

</body>
</html>