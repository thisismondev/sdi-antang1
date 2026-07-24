@extends('layouts.main')

@section('title','Dashboard')

@section('content')

<!-- Banner -->
<div class="rounded-3xl bg-blue-600 p-10 text-blue mb-8">

    <h1 class="text-5xl font-extrabold mb-3">
        Dashboard Admin 👋
    </h1>

    <p class="text-xl text-blue-100">
        Selamat datang kembali,
        <span class="font-bold">{{ auth()->user()->name }}</span>
    </p>

    <p class="text-blue-200 mt-3 text-lg">
        Sistem Informasi Persuratan Berbasis Priority Scheduling
    </p>

</div>

<!-- Statistik -->

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">


<!-- Total Surat -->
<div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100 hover:shadow-lg transition duration-300">

    <div class="flex justify-between items-center">

        <div>

           <p class="text-gray-500 text-sm font-medium">
                Total Surat
            </p>

            <h2 class="text-4xl font-bold text-blue-900 mt-3">
                {{ $totalSurat }}
            </h2>

        </div>
<div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center">

    <span class="text-3xl">📄</span>

</div>

    </div>

    </div>

    <!-- Menunggu -->
    <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100 hover:shadow-lg transition duration-300">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500">
                    Menunggu
                </p>

                <h2 class="text-4xl font-bold text-yellow-500 mt-3">
                    {{ $menunggu }}
                </h2>

            </div>

           <div class="w-16 h-16 rounded-2xl bg-yellow-100 flex items-center justify-center">

    <span class="text-3xl">
        ⏳
    </span>

</div>

        </div>

    </div>

    <!-- Diproses -->
    <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100 hover:shadow-lg transition duration-300">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500">
                    Diproses
                </p>

                <h2 class="text-4xl font-bold text-blue-600 mt-3">
                    {{ $diproses }}
                </h2>

            </div>

           <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center">

    <span class="text-3xl">
        🔄
    </span>

</div>

        </div>

    </div>

    <!-- Selesai -->
    <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100 hover:shadow-lg transition duration-300">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500">
                    Selesai
                </p>

                <h2 class="text-4xl font-bold text-green-600 mt-3">
                    {{ $selesai }}
                </h2>

            </div>

            <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center">

    <span class="text-3xl">
        ✅
    </span>

</div>

        </div>

    </div>

    <!-- Guru -->
    <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100 hover:shadow-lg transition duration-300">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500">
                    Guru
                </p>

                <h2 class="text-4xl font-bold text-indigo-600 mt-3">
                    {{ $totalGuru }}
                </h2>

            </div>

            <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center">

    <span class="text-3xl">
        👨‍🏫
    </span>

</div>

        </div>

    </div>

    <!-- Orang Tua -->
    <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100 hover:shadow-lg transition duration-300">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500">
                    Orang Tua
                </p>

                <h2 class="text-4xl font-bold text-pink-600 mt-3">
                    {{ $totalOrangTua }}
                </h2>

            </div>

           <div class="w-16 h-16 rounded-2xl bg-pink-100 flex items-center justify-center">

    <span class="text-3xl">
        👨‍👩‍👧
    </span>

</div>

        </div>

    </div>

</div>

<!-- Informasi -->

<div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mt-8">

    <div class="bg-white rounded-2xl shadow-lg p-6">

       <h2 class="text-2xl font-bold text-blue-900 mb-5">

📌 Informasi Sistem

</h2>

<ul class="space-y-4 text-base">

<li class="flex justify-between items-center">

    <span>📄 Total Surat</span>

    <span class="font-bold text-blue-700">{{ $totalSurat }}</span>

</li>

<li class="flex justify-between items-center">

    <span>⏳ Menunggu</span>

    <span class="font-bold text-yellow-600">{{ $menunggu }}</span>

</li>

<li class="flex justify-between items-center">

    <span>🔄 Diproses</span>

    <span class="font-bold text-indigo-600">{{ $diproses }}</span>

</li>

<li class="flex justify-between items-center">

    <span>✅ Selesai</span>

    <span class="font-bold text-green-600">{{ $selesai }}</span>

</li>

</ul>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">

    <h2 class="text-2xl font-bold text-blue-900 mb-5">
        ⭐ Priority Scheduling
    </h2>

    <p class="text-gray-600 leading-7 text-justify">

        Sistem ini menggunakan metode
        <span class="font-bold text-blue-800">
            Priority Scheduling
        </span>

        untuk menentukan urutan surat berdasarkan
        <span class="font-semibold">tingkat urgensi</span>,
        <span class="font-semibold">jenis surat</span>,
        dan
        <span class="font-semibold">pengirim</span>,
        sehingga proses administrasi menjadi lebih cepat,
        tepat, dan efisien.

    </p>
 <!-- TAMBAHKAN DI SINI -->
  <div class="mt-5 rounded-xl bg-blue-50 border border-blue-100 p-4">

    <p class="text-sm text-blue-700">

        <strong>Metode:</strong> Priority Scheduling

        <br>

        <strong>Parameter:</strong>

        Jenis Surat • Urgensi • Pengirim

    </p>

</div>
</div>
</div>
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mt-8">

    <!-- Grafik Batang -->
    <div class="bg-white rounded-2xl shadow-lg p-6">

        <h2 class="text-xl font-bold text-blue-900 mb-6">
            📈 Grafik Persuratan Bulanan
        </h2>

        <div class="h-72">
            <canvas id="chartSurat"></canvas>
        </div>

    </div>

    <!-- Pie Chart -->
    <div class="bg-white rounded-2xl shadow-lg p-6">

        <h2 class="text-xl font-bold text-blue-900 mb-6">
            🥧 Status Surat
        </h2>

        <div class="h-72">
            <canvas id="statusChart"></canvas>
        </div>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const statusCtx = document.getElementById('statusChart');

new Chart(statusCtx, {
    type: 'doughnut',
    data: {
        labels: ['Menunggu', 'Diproses', 'Selesai'],
        datasets: [{
            data: [
                {{ $menunggu }},
                {{ $diproses }},
                {{ $selesai }}
            ],
            backgroundColor: [
                '#FACC15',
                '#3B82F6',
                '#22C55E'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

const ctx=document.getElementById('chartSurat');

new Chart(ctx,{

type:'bar',

data:{

labels: [
@foreach($chartData as $bulan => $jumlah)
'{{ $bulan }}',
@endforeach
],

datasets: [{

label: 'Jumlah Surat',

data: [
@foreach($chartData as $bulan => $jumlah)
{{ $jumlah }},
@endforeach
],


backgroundColor:[
'#1E3A8A',
'#2563EB',
'#3B82F6',
'#60A5FA',
'#93C5FD',
'#BFDBFE'
],

borderRadius:12

}]

},

options:{

responsive:true,

maintainAspectRatio:false,

plugins:{

legend:{
display:false
}

},

scales:{

y:{
beginAtZero:true,
ticks:{
stepSize:1
}
}

}

}

});

</script>
@endsection