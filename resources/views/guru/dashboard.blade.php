@extends('layouts.main')

@section('title','Dashboard Guru')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-gray-800">
        Dashboard Guru
    </h1>

    <p class="text-gray-500 mt-2">
        Selamat datang, {{ auth()->user()->name }}
    </p>

</div>

<div class="grid grid-cols-4 gap-6 mb-8">

    <div class="bg-blue-600 rounded-xl shadow p-6 text-white">

        <h2 class="text-lg">
            Total Surat
        </h2>

        <h1 class="text-4xl font-bold mt-3">

            {{ $jumlahSurat }}

        </h1>

    </div>

    <div class="bg-yellow-500 rounded-xl shadow p-6 text-white">

        <h2 class="text-lg">
            Menunggu
        </h2>

        <h1 class="text-4xl font-bold mt-3">

            {{ $menunggu }}

        </h1>

    </div>

    <div class="bg-blue-500 rounded-xl shadow p-6 text-white">

        <h2 class="text-lg">
            Diproses
        </h2>

        <h1 class="text-4xl font-bold mt-3">

            {{ $diproses }}

        </h1>

    </div>

    <div class="bg-green-600 rounded-xl shadow p-6 text-white">

        <h2 class="text-lg">
            Selesai
        </h2>

        <h1 class="text-4xl font-bold mt-3">

            {{ $selesai }}

        </h1>

    </div>

</div>

<div class="grid grid-cols-2 gap-6">

    <div class="bg-white rounded-xl shadow p-8">

        <h2 class="text-2xl font-bold mb-4">

            Ajukan Surat

        </h2>

        <p class="text-gray-500 mb-6">

            Buat surat baru untuk dikirim ke Admin.

        </p>

        <a
            href="{{ route('surat.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

            + Ajukan Surat

        </a>

    </div>

    <div class="bg-white rounded-xl shadow p-8">

        <h2 class="text-2xl font-bold mb-4">

            Riwayat Surat

        </h2>

        <p class="text-gray-500 mb-6">

            Lihat seluruh surat yang pernah diajukan.

        </p>

        <a
            href="{{ route('guru.riwayat') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

            Lihat Riwayat

        </a>

    </div>

</div>

@endsection