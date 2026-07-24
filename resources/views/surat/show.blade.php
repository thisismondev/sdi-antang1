@extends('layouts.main')

@section('title','Detail Surat')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>
        <h1 class="text-4xl font-bold">
            Detail Surat
        </h1>

        <p class="text-gray-500">
            Informasi lengkap surat
        </p>
    </div>

    <a href="{{ route('surat.index') }}"
       class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg">
        ← Kembali
    </a>

</div>

<div class="bg-white rounded-xl shadow p-8">
    @if(session('success'))

<div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded">

    {{ session('success') }}

</div>

@endif

<table class="w-full">

<tr class="border-b">
    <td class="py-3 font-semibold w-60">Nomor Surat</td>
    <td>{{ $surat->nomor_surat }}</td>
</tr>


<tr class="border-b">
    <td class="py-3 font-semibold">Nama Siswa</td>
    <td>{{ $surat->nama_siswa }}</td>
</tr>

<tr class="border-b">
    <td class="py-3 font-semibold">NIS</td>
    <td>{{ $surat->nis }}</td>
</tr>

<tr class="border-b">
    <td class="py-3 font-semibold">Kelas</td>
    <td>{{ $surat->kelas }}</td>
</tr>

<tr class="border-b">
    <td class="py-3 font-semibold">Jenis Surat</td>
    <td>{{ $surat->jenis_surat }}</td>
</tr>

<tr class="border-b">
    <td class="py-3 font-semibold">Urgensi</td>
    <td>{{ $surat->urgensi }}</td>
</tr>

<tr class="border-b">
    <td class="py-3 font-semibold">Pengirim</td>
    <td>{{ $surat->pengirim }}</td>
</tr>

<tr class="border-b">
    <td class="py-3 font-semibold">Priority Score</td>
    <td>

        @if($surat->priority_score <= 5)

<span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-semibold">
    {{ $surat->priority_score }}
</span>

@elseif($surat->priority_score <= 8)

<span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-semibold">
    {{ $surat->priority_score }}
</span>

@else

<span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
    {{ $surat->priority_score }}
</span>

@endif
    </td>
</tr>
<tr class="border-b">
    <td class="py-3 font-semibold">Arrival Time</td>
    <td>

        {{ $surat->created_at->format('d M Y, H:i') }}

        <span class="text-sm text-gray-500">
            (Waktu surat masuk ke sistem)
        </span>

    </td>
</tr>

<tr>
    <td class="py-3 font-semibold">Status</td>

    <td>

        @if($surat->status=="Menunggu")

            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full">

                Menunggu

            </span>

        @elseif($surat->status=="Diproses")

            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full">

                Diproses

            </span>

        @else

            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                Selesai

            </span>

        @endif

    </td>

</tr>

<tr class="border-b">
    <td class="py-3 font-semibold">Keterangan</td>
    <td>{{ $surat->keterangan }}</td>
</tr>

</table>

@if(auth()->user()->role == 'admin')

<hr class="my-8">

<h2 class="text-2xl font-bold mb-5">
    Upload Surat Balasan
</h2>

<form action="{{ route('surat.upload',$surat) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <input
        type="file"
        name="file_surat"
        accept=".pdf"
        class="border p-2 rounded w-full">

    @error('file_surat')
    <p class="text-red-500 mt-2">
        {{ $message }}
    </p>
@enderror

    <button
    type="submit"
    class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
        Upload Surat

    </button>

</form>
@endif

<hr class="my-8">

@if(auth()->user()->role != 'admin')

<hr class="my-8">

@if($surat->file_surat)

<div class="mt-6">

    <label class="font-semibold">
        File Surat Balasan
    </label>

    <br>

    <a href="{{ asset('storage/'.$surat->file_surat) }}"
       target="_blank"
       class="inline-block bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">

        📄 Download Surat

    </a>

</div>

@else

<div class="mt-6 text-red-500">

    Belum ada surat balasan yang diupload.

</div>

@endif

@endif


@if(auth()->user()->role == 'admin' && $surat->status != 'Selesai')

<div class="flex gap-3 mt-8">

@if($surat->status == 'Menunggu')

<form action="{{ route('surat.status',$surat) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" name="status" value="Diproses">

    <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

        Proses

    </button>

</form>

@endif

@if($surat->status != 'Selesai')

<form action="{{ route('surat.status',$surat) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" name="status" value="Selesai">

    <button
        type="submit"
        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

        Selesai

    </button>

</form>

@endif

        <form action="{{ route('surat.destroy',$surat) }}" method="POST">

            @csrf
            @method('DELETE')

            <button
             type="submit"
                onclick="return confirm('Yakin ingin menghapus surat ini?')"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">

                Hapus

            </button>

        </form>

    </div>
@endif
</div>
@endsection