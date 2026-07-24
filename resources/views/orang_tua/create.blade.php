@extends('layouts.main')

@section('title','Pengajuan Izin Sakit')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Pengajuan Izin Sakit
        </h1>

        <a href="{{ route('ortu.dashboard') }}"
           class="bg-gray-500 text-white px-5 py-2 rounded-lg">
            Kembali
        </a>

    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surat.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow p-8">

        @csrf

        <h2 class="text-xl font-semibold border-b pb-3 mb-6">
            Data Siswa
        </h2>

        <div class="grid grid-cols-2 gap-5">

            <div>
                <label class="font-medium">Nama Siswa</label>

                <input
                    type="text"
                    name="nama_siswa"
                    value="{{ old('nama_siswa') }}"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>
            </div>

            <div>
                <label class="font-medium">NIS</label>

                <input
                    type="text"
                    name="nis"
                    value="{{ old('nis') }}"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>
            </div>

            <div>
                <label class="font-medium">Kelas</label>

                <input
                    type="text"
                    name="kelas"
                    value="{{ old('kelas') }}"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>
            </div>

            <div>
                <label class="font-medium">Tanggal Surat</label>

                <input
                    type="date"
                    name="tanggal_surat"
                    value="{{ old('tanggal_surat') }}"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>
            </div>

            <div>
                <label class="font-medium">Tanggal Sakit</label>

                <input
                    type="date"
                    name="tanggal_sakit"
                    value="{{ old('tanggal_sakit') }}"
                    class="w-full border rounded-lg p-3 mt-2">
            </div>

            <div>
                <label class="font-medium">Lama Izin (Hari)</label>

                <input
                    type="number"
                    name="lama_izin"
                    value="{{ old('lama_izin') }}"
                    min="1"
                    max="30"
                    class="w-full border rounded-lg p-3 mt-2">
            </div>

        </div>

        <div class="mt-6">

            <label class="font-medium">Keterangan</label>

            <textarea
                name="keterangan"
                rows="5"
                class="w-full border rounded-lg p-3 mt-2"
                required>{{ old('keterangan') }}</textarea>

        </div>

        <div class="mt-6">

            <label class="font-medium">
                Upload Surat Dokter (PDF)
            </label>

            <input
                type="file"
                name="lampiran"
                accept=".pdf"
                class="w-full border rounded-lg p-3 mt-2">

            <p class="text-sm text-gray-500 mt-2">
                Maksimal ukuran file 2 MB.
            </p>

        </div>

        {{-- Hidden Value --}}

        <input
            type="hidden"
            name="nomor_surat"
            value="IS-{{ date('YmdHis') }}">

        <input
            type="hidden"
            name="jenis_surat"
            value="Surat Izin Siswa">

        <input
            type="hidden"
            name="tujuan"
            value="Wali Kelas">

        <input
            type="hidden"
            name="urgensi"
            value="Sedang">

        <input
            type="hidden"
            name="pengirim"
            value="Orang Tua">

        <div class="mt-8 flex gap-3">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

                Ajukan Surat

            </button>

            <a href="{{ route('ortu.dashboard') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection