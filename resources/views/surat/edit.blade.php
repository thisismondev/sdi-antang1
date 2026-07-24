@extends('layouts.main')

@section('title','Edit Surat')

@section('content')

@if(session('success'))

<div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded">

{{ session('success') }}

</div>

@endif

<div class="flex justify-between items-center mb-8">

    <h1 class="text-4xl font-bold">
        Edit Surat
    </h1>

    <a href="{{ route('surat.index') }}"
        class="bg-gray-500 text-white px-5 py-3 rounded-lg">

        Kembali

    </a>

</div>


<form
action="{{ route('surat.update',$surat) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="bg-white rounded-xl shadow p-8">

<h2 class="text-2xl font-bold mb-6">
Data Siswa
</h2>


<div class="grid grid-cols-2 gap-6">

<div>

<label>Nomor Surat</label>

<input
type="text"
name="nomor_surat"
value="{{ old('nomor_surat',$surat->nomor_surat) }}"
class="w-full border rounded-lg p-3">

@error('nomor_surat')

<p class="text-red-500 text-sm">

{{ $message }}

</p>

@enderror

</div>

<div>

<label>Nama Siswa</label>

<input
type="text"
name="nama_siswa"
value="{{ old('nama_siswa',$surat->nama_siswa) }}"
class="w-full border rounded-lg p-3">

@error('nomor_surat')

<p class="text-red-500 text-sm">

{{ $message }}

</p>

@enderror
</div>

<div>

<label>NIS</label>

<input
type="text"
name="nis"
value="{{ old('nis',$surat->nis) }}"
class="w-full border rounded-lg p-3">

@error('nomor_surat')

<p class="text-red-500 text-sm">

{{ $message }}

</p>

@enderror
</div>

<div>

<label>Kelas</label>

<input
type="text"
name="kelas"
value="{{ old('kelas',$surat->kelas) }}"
class="w-full border rounded-lg p-3">


@error('nomor_surat')

<p class="text-red-500 text-sm">

{{ $message }}

</p>

@enderror
</div>

</div>


<hr class="my-8">


<h2 class="text-2xl font-bold mb-6">

Informasi Surat

<div class="mb-6">

<span class="font-semibold">

Priority Score :

<div class="mb-6">

<span class="font-semibold">

Status :

</span>

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

</div>
</span>

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

{{ $surat->priority_score }}

</span>

</div>

</h2>


<div class="grid grid-cols-2 gap-6">

<div>

<label>Tanggal Surat</label>

<input
type="date"
name="tanggal_surat"
value="{{ old('tanggal_surat',$surat->tanggal_surat) }}"
class="w-full border rounded-lg p-3">

@error('nomor_surat')

<p class="text-red-500 text-sm">

{{ $message }}

</p>

@enderror
</div>

<div>

<label>Tanggal Sakit</label>

<input
type="date"
name="tanggal_sakit"
value="{{ old('tanggal_sakit',$surat->tanggal_sakit) }}"
class="w-full border rounded-lg p-3">

@error('nomor_surat')

<p class="text-red-500 text-sm">

{{ $message }}

</p>

@enderror
</div>

<div>

<label>Lama Izin</label>

<input
type="number"
name="lama_izin"
value="{{ old('lama_izin',$surat->lama_izin) }}"
class="w-full border rounded-lg p-3">

@error('nomor_surat')

<p class="text-red-500 text-sm">

{{ $message }}

</p>

@enderror
</div>

<div>

<label>Jenis Surat</label>

<select
name="jenis_surat"
class="w-full border rounded-lg p-3">

<option {{ $surat->jenis_surat=='Izin Sakit'?'selected':'' }}>
Izin Sakit
</option>

<option {{ $surat->jenis_surat=='Surat Tugas'?'selected':'' }}>
Surat Tugas
</option>

<option {{ $surat->jenis_surat=='Dispensasi'?'selected':'' }}>
Dispensasi
</option>

<option {{ $surat->jenis_surat=='Memo'?'selected':'' }}>
Memo
</option>

<option {{ $surat->jenis_surat=='Lainnya'?'selected':'' }}>
Lainnya
</option>

</select>

</div>

<div>

<label>Urgensi</label>

<select
name="urgensi"
class="w-full border rounded-lg p-3">

<option {{ $surat->urgensi=='Tinggi'?'selected':'' }}>
Tinggi
</option>

<option {{ $surat->urgensi=='Sedang'?'selected':'' }}>
Sedang
</option>

<option {{ $surat->urgensi=='Rendah'?'selected':'' }}>
Rendah
</option>

</select>

</div>

<div>

<label>Pengirim</label>

<select
name="pengirim"
class="w-full border rounded-lg p-3">

<option {{ $surat->pengirim=='Guru'?'selected':'' }}>
Guru
</option>

<option {{ $surat->pengirim=='Orang Tua'?'selected':'' }}>
Orang Tua
</option>

</select>

</div>

</div>


<div class="mt-6">

<label>Keterangan</label>

<textarea
name="keterangan"
rows="4"
class="w-full border rounded-lg p-3">{{ old('keterangan',$surat->keterangan) }}</textarea>

</div>
@if($surat->lampiran)

<div class="mb-4">

    <label class="font-semibold">
        Lampiran Saat Ini
    </label>

    <br>

    <a href="{{ asset('storage/'.$surat->lampiran) }}"
       target="_blank"
       class="inline-block bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">

        📄 Lihat Lampiran

    </a>

</div>

@endif

<div class="mt-6">

<label>Lampiran Baru</label>

<input
type="file"
name="lampiran"
class="w-full border rounded-lg p-3">

</div>


<div class="mt-10 flex gap-3">

<a
href="{{ route('surat.index') }}"
class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg">

Batal

</a>

<button
type="submit"
class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

Simpan Perubahan

</button>

</div>

</div>

</form>

@endsection