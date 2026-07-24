@extends('layouts.main')

@section('title','Riwayat Surat')

@section('content')

<h1 class="text-4xl font-bold mb-8">
    Riwayat Surat Saya
</h1>

@if(session('success'))
<div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded mb-5">
    {{ session('success') }}
</div>
@endif

<div class="bg-white shadow rounded-xl overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">

<tr>

<th class="p-4">Nomor Surat</th>

<th>Jenis</th>

<th>Status</th>

<th>Priority</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

@forelse($surats as $surat)

<tr class="border-b">

<td class="p-4">
    {{ $surat->nomor_surat }}
</td>

<td>
    {{ $surat->jenis_surat }}
</td>

<td>
    {{ $surat->status }}
</td>

<td>
    {{ $surat->priority_score }}
</td>

<td>

<a
href="{{ route('surat.show',$surat) }}"
class="bg-blue-600 text-white px-4 py-2 rounded">

Detail

</a>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center p-8">

Belum ada surat.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection