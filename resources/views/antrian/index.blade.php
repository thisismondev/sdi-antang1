@extends('layouts.main')

@section('title','Antrian Prioritas')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold">
            ⭐ Antrian Prioritas
        </h1>

        <p class="text-gray-500 mt-2">
            Daftar surat berdasarkan Priority Scheduling
        </p>

    </div>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">

<tr>

<th class="p-4">Rank</th>

<th>Nomor Surat</th>

<th>Nama</th>

<th>Jenis</th>

<th>Priority</th>

<th>Status</th>

<th>Tanggal</th>

</tr>

</thead>

<tbody>

@forelse($antrian as $surat)

<tr class="border-b hover:bg-gray-50">

<td class="p-4">

@if($loop->iteration==1)

🥇

@elseif($loop->iteration==2)

🥈

@elseif($loop->iteration==3)

🥉

@else

{{ $loop->iteration }}

@endif

</td>

<td>{{ $surat->nomor_surat }}</td>

<td>{{ $surat->nama_siswa }}</td>

<td>{{ $surat->jenis_surat }}</td>

<td>

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

{{ $surat->priority_score }}

</span>

</td>

<td>

@if($surat->status=="Menunggu")

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

Menunggu

</span>

@elseif($surat->status=="Diproses")

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

{{ $surat->created_at->format('d M Y') }}

</td>

</tr>

@empty

<tr>

<td colspan="7" class="text-center py-10">

Belum ada data.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection