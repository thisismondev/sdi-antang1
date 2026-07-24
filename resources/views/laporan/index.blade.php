@extends('layouts.main')

@section('title', 'Laporan')

@section('content')

<div class="w-full bg-white rounded-xl shadow-lg p-8">

    <h2 class="text-2xl font-bold mb-5">
        📊 Laporan Persuratan
    </h2>

    <table class="w-full table-auto border-collapse">

        <thead class="bg-blue-600 text-white">
<tr>
    <th class="px-5 py-4 text-left">No</th>
    <th class="px-5 py-4 text-left">No Surat</th>
    <th class="px-5 py-4 text-left">Jenis Surat</th>
    <th class="px-5 py-4 text-left">Pengirim</th>
    <th class="px-5 py-4 text-left">Status</th>
    <th class="px-5 py-4 text-center">Priority</th>
</tr>
</thead>

        <tbody>

        @foreach($surats as $surat)

           <tr class="border-b hover:bg-gray-50 transition">

    <td class="px-5 py-4">
        {{ $loop->iteration }}
    </td>

    <td class="px-5 py-4">
        {{ $surat->nomor_surat }}
    </td>

    <td class="px-5 py-4">
        {{ $surat->jenis_surat }}
    </td>

    <td class="px-5 py-4">
        {{ $surat->pengirim }}
    </td>

    <td class="px-5 py-4">
        {{ $surat->status }}
    </td>

    <td class="px-5 py-4 text-center">
        {{ $surat->priority_score }}
    </td>

</tr>
        @endforeach

        </tbody>

    </table>

</div>

@endsection