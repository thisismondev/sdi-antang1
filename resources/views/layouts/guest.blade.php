<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UPT SPF SD INPRES ANTANG 1</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="h-screen overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700">

<div class="h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-6xl h-[92vh] bg-white rounded-3xl shadow-2xl overflow-hidden">

        <div class="grid grid-cols-1 lg:grid-cols-2 h-full">

            <!-- KIRI -->
            <div class="bg-gradient-to-br from-blue-900 via-blue-800 to-blue-600 p-8 flex flex-col justify-start items-center text-center rounded-l-3xl pt-10">

                <div class="text-6xl mb-6">
                    🏫
                </div>

                <h1 class="text-2xl font-extrabold text-white leading-tight">
                    UPT SPF SD INPRES ANTANG 1
                </h1>

                <p class="mt-5 text-2xl font-semibold text-blue-100">
                    Sistem Informasi Persuratan
                </p>

                <p class="mt-2 text-blue-200 text-lg">
                    Berbasis Priority Scheduling
                </p>

                <!-- Card -->
                <div class="mt-5 bg-white/10 rounded-2xl p-5 w-full">
                    <h2 class="text-2xl font-bold text-white">
                        ✨ Cepat • Tepat • Transparan
                    </h2>

                    <p class="mt-3 text-blue-100 leading-7">
                        Mempermudah pengelolaan surat masuk,
                        surat keluar, surat izin siswa,
                        serta proses administrasi sekolah
                        secara cepat, tepat, dan efisien.
                    </p>

                </div>

         <!-- Fitur -->
<div class="grid grid-cols-4 gap-2 w-full mt-5">

    <div class="bg-white/10 rounded-lg p-2 text-center">
        <div class="text-lg">📄</div>
        <h3 class="text-[11px] font-semibold text-white mt-1">
            Surat
        </h3>
    </div>

    <div class="bg-white/10 rounded-lg p-2 text-center">
        <div class="text-lg">⭐</div>
        <h3 class="text-[11px] font-semibold text-white mt-1">
            Prioritas
        </h3>
    </div>

    <div class="bg-white/10 rounded-lg p-2 text-center">
        <div class="text-lg">🛡️</div>
        <h3 class="text-[11px] font-semibold text-white mt-1">
            Aman
        </h3>
    </div>

    <div class="bg-white/10 rounded-lg p-2 text-center">
        <div class="text-lg">📊</div>
        <h3 class="text-[11px] font-semibold text-white mt-1">
            Riwayat
        </h3>
    </div>

</div>

                <!-- Footer -->
                <div class="mt-8">
                    <p class="text-blue-200 text-sm">
                        © 2026 UPT SPF SD Inpres Antang 1
                    </p>
                </div>

            </div>

            <!-- KANAN -->
            <div class="bg-white p-6 flex flex-col justify-center rounded-r-3xl">

                <div class="w-full max-w-lg mx-auto">

                    {{ $slot }}

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>