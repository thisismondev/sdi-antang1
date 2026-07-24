<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | UPT SPF SD Inpres Antang 1</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
 <aside class="w-72 bg-gradient-to-b from-blue-950 via-blue-900 to-blue-800 text-white flex flex-col shadow-2xl border-r border-blue-700">

        <!-- Logo -->
       <div class="py-8 px-6 text-center border-b border-blue-400/30">

           <div class="w-24 h-24 mx-auto rounded-full bg-white shadow-lg flex items-center justify-center">

            <span class="text-5xl">🏫</span>

            </div>

            <h1 class="text-4xl font-bold mt-5 tracking-tight">
    Persuratan
</h1>

<p class="text-base text-blue-200 mt-1">
    Sistem Persuratan Sekolah
</p>
        </div>

        <!-- Menu -->
        <div class="flex-1 overflow-y-auto py-5">

    <p class="text-blue-300 text-xs uppercase tracking-widest px-8 my-4">
        Menu Utama
    </p>

    @if(auth()->user()->role=='admin')

        <a href="{{ route('dashboard') }}"
           class="mx-4 flex items-center gap-3 rounded-xl px-5 py-3 transition duration-200
           {{ request()->routeIs('dashboard') ? 'bg-blue-500 shadow-lg' : 'hover:bg-blue-700' }}">
            <span class="text-xl">🏠</span>
            <span class="font-medium">Dashboard</span>
        </a>

        <a href="{{ route('surat.index') }}"
           class="mx-4 mt-2 flex items-center gap-3 rounded-xl px-5 py-3 transition duration-200
           {{ request()->routeIs('surat.*') ? 'bg-blue-500 shadow-lg' : 'hover:bg-blue-600' }}">
            <span>📄</span>
            <span>Data Surat</span>
        </a>

        <a href="{{ route('antrian.index') }}"
           class="mx-4 mt-2 flex items-center gap-3 rounded-xl px-5 py-3 transition duration-200
           {{ request()->routeIs('antrian.*') ? 'bg-blue-500 shadow-lg' : 'hover:bg-blue-600' }}">
            <span>⭐</span>
            <span>Antrian Prioritas</span>
        </a>

        <a href="{{ route('users.index') }}"
           class="mx-4 mt-2 flex items-center gap-3 rounded-xl px-5 py-3 transition duration-200
           {{ request()->routeIs('users.*') ? 'bg-blue-500 shadow-lg' : 'hover:bg-blue-600' }}">
            <span>👥</span>
            <span>Kelola User</span>
        </a>

        <a href="{{ route('laporan.index') }}"
           class="mx-4 mt-2 flex items-center gap-3 rounded-xl px-5 py-3 transition duration-200
           {{ request()->routeIs('laporan.*') ? 'bg-blue-500 shadow-lg' : 'hover:bg-blue-600' }}">
            <span>📊</span>
            <span>Laporan</span>
        </a>

    @elseif(auth()->user()->role=='guru')

        <a href="{{ route('guru.dashboard') }}"
           class="flex items-center gap-3 px-6 py-3 hover:bg-blue-700">
            🏠 Dashboard
        </a>

        <a href="{{ route('surat.create') }}"
           class="flex items-center gap-3 px-6 py-3 hover:bg-blue-700">
            📝 Buat Permintaan
        </a>

        <a href="{{ route('guru.riwayat') }}"
           class="flex items-center gap-3 px-6 py-3 hover:bg-blue-700">
            📂 Riwayat Surat
        </a>

    @elseif(auth()->user()->role=='orang_tua')

        <a href="{{ route('ortu.dashboard') }}"
           class="flex items-center gap-3 px-6 py-3 hover:bg-blue-700">
            🏠 Dashboard
        </a>

        <a href="{{ route('surat.create') }}"
           class="flex items-center gap-3 px-6 py-3 hover:bg-blue-700">
            📝 Ajukan Surat
        </a>

        <a href="{{ route('ortu.riwayat') }}"
           class="flex items-center gap-3 px-6 py-3 hover:bg-blue-700">
            📂 Riwayat
        </a>

    @endif

</div>


        <!-- User -->
   <div class="mt-auto p-5">

            <div class="bg-blue-950/60 rounded-2xl p-4 flex items-center gap-4 border border-blue-700">

                <div class="w-12 h-12 rounded-full bg-white text-[#173B70] flex items-center justify-center font-bold text-lg">

                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                </div>

                <div>

                    <h3 class="font-semibold">
                        {{ auth()->user()->name }}
                    </h3>

                    <small class="text-blue-200">
                        {{ ucfirst(auth()->user()->role) }}
                    </small>

                </div>

            </div>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

               <button
   class="mt-4 w-full bg-red-500 hover:bg-red-600 py-3 rounded-xl font-semibold shadow-lg transition">

                    Logout

                </button>

            </form>

        </div>

    </aside>

    <!-- CONTENT -->
   <div class="flex-1 flex flex-col">

        <!-- Header -->
      <header class="bg-white h-20 px-8 flex items-center justify-between shadow-sm border-b border-gray-200">
    <div>

        <h1 class="text-5xl font-extrabold text-slate-900 leading-none">

            @yield('title')

        </h1>

        <p class="text-gray-500 mt-1">

Sistem Persuratan Sekolah

</p>

    </div>

    <div class="flex items-center gap-6">


        <button class="w-11 h-11 rounded-full bg-yellow-100 flex items-center justify-center hover:bg-yellow-200 transition">

            🔔

        </button>

        <div class="text-right">

            <h3 class="font-semibold">

                {{ auth()->user()->name }}

            </h3>

            <small class="text-gray-500">

                {{ ucfirst(auth()->user()->role) }}

            </small>

        </div>

    </div>

</header>

        <!-- Isi -->
       <main class="flex-1 p-8 bg-slate-100">

            @yield('content')

        </main>

        <!-- Footer -->
       <footer class="bg-white border-t text-center p-4 text-gray-500">
        © 2026 Sistem Persuratan Sekolah

</footer>
    </div>

</div>
</body>
</html>