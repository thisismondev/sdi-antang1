@extends('layouts.main')

@section('title','Riwayat Surat')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold">
            Riwayat Surat
        </h1>

        <p class="text-gray-500">
            Daftar seluruh surat yang pernah diajukan.
        </p>

    </div>

    <a href="{{ route('surat.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

        + Ajukan Surat

    </a>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">

<tr>

    <th class="p-4">No</th>
    <th>Nomor Surat</th>
    <th>Jenis Surat</th>
    <th>Priority</th>
    <th>Status</th>
    <th>Tanggal</th>
    <th>Aksi</th>

</tr>

</thead>

<tbody>

@forelse($surats as $surat)

<tr class="border-t hover:bg-gray-50">

    <td class="p-4">

        {{ $loop->iteration }}

    </td>

    <td>

        {{ $surat->nomor_surat }}

    </td>

    <td>

        {{ $surat->jenis_surat }}

    </td>

    <td>

        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

            {{ $surat->priority_score }}

        </span>

    </td>

    <td>

        @if($surat->status=='Menunggu')

            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                Menunggu

            </span>

        @elseif($surat->status=='Diproses')

            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                Diproses

            </span>

        @else

            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                Selesai

            </span>

        @endif

    </td>

    <td>

        {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d M Y') }}

    </td>

    <td>

        <a href="{{ route('surat.show',$surat) }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded">

            Detail

        </a>

    </td>

</tr>

@empty

<tr>

    <td colspan="7"
        class="text-center py-10 text-gray-500">

        Belum ada surat.

    </td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection