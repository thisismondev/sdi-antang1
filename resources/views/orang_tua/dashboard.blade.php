@extends('layouts.main')

@section('title','Dashboard Orang Tua')

@section('content')

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-xl font-bold">

            Selamat Datang

        </h2>

        <p class="mt-3 text-gray-500">

            {{ auth()->user()->name }}

        </p>

    </div>

    <div class="bg-blue-600 rounded-xl shadow p-6 text-white">

        <h2 class="text-xl font-bold">

            Ajukan Izin Sakit

        </h2>

        <a
            href="{{ route('surat.create') }}"
            class="inline-block mt-5 bg-white text-blue-700 px-5 py-2 rounded-lg">

            Buat Surat

        </a>

    </div>

    <div class="bg-green-600 rounded-xl shadow p-6 text-white">

        <h2 class="text-xl font-bold">

            Riwayat Pengajuan

        </h2>

       <a
    href="{{ route('ortu.riwayat') }}"
    class="inline-block mt-5 bg-white text-green-700 px-5 py-2 rounded-lg">

    Lihat

</a>
    </div>

</div>

@endsection