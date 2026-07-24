@extends('layouts.main')

@section('title','Tambah Surat')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Form Permintaan Surat
        </h1>

        <a href="{{ route('surat.index') }}"
           class="bg-gray-500 text-white px-5 py-2 rounded-lg">
            Kembali
        </a>

    </div>

    <form action="{{ route('surat.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow p-8">

        @csrf

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h2 class="text-xl font-semibold mb-5 border-b pb-3">
            Data Surat
        </h2>

        <div class="grid grid-cols-2 gap-5">

            <div>
                <label>Nomor Surat</label>
                <input
                    type="text"
                    name="nomor_surat"
                    class="w-full border rounded-lg p-3 mt-2"
                    placeholder="Contoh : SM-001"
                    required>
            </div>

            <div>
                <label>Jenis Surat</label>

                <select
                    name="jenis_surat"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>

                    <option value="">-- Pilih Dokumen --</option>

                    <option>Surat Masuk</option>
                    <option>Surat Keluar</option>
                    <option>Surat Pindah Masuk</option>
                    <option>Surat Pindah Keluar</option>
                    <option>Surat Izin Lomba</option>
                    <option>Surat Keterangan Aktif Sekolah</option>
                    <option>Daftar Hadir PTK</option>
                    <option>Daftar Hadir Siswa</option>
                    <option>Rekap Nilai</option>
                    <option>Dokumen Rapat</option>
                    <option>Dokumen Kurikulum</option>
                    <option>Dokumen Inovasi</option>
                    <option>Dokumen Adiwiyata</option>
                    <option>Dokumen Dana BOS</option>
                    <option>Surat Izin Guru</option>
                    <option>Buku Kunjungan Tamu</option>

                </select>
            </div>

            <div>
                <label>Tanggal Surat</label>

                <input
                    type="date"
                    name="tanggal_surat"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>
            </div>

            <div>
                <label>Urgensi</label>

                <select
                    name="urgensi"
                    class="w-full border rounded-lg p-3 mt-2">

                    <option>Tinggi</option>
                    <option>Sedang</option>
                    <option>Rendah</option>

                </select>
            </div>

            <div>
                <label>Tujuan / Penerima</label>

                <select
                    name="tujuan"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>

                    <option value="">-- Pilih Tujuan --</option>

                    <option>Kepala Sekolah</option>
                    <option>Wakil Kepala Sekolah</option>
                    <option>Tata Usaha</option>
                    <option>Operator Sekolah</option>
                    <option>Bendahara BOS</option>
                    <option>Guru BK</option>
                    <option>Wali Kelas</option>
                    <option>Dinas Pendidikan</option>
                    <option>Lainnya</option>

                </select>

            </div>

            <div>
                <label>Pengirim</label>

                <input
                    type="text"
                    class="w-full border rounded-lg p-3 mt-2 bg-gray-100"
                    value="Guru"
                    readonly>

                <input
                    type="hidden"
                    name="pengirim"
                    value="Guru">

            </div>

        </div>

        <div class="mt-5">

            <label>Keterangan</label>

            <textarea
                name="keterangan"
                rows="5"
                class="w-full border rounded-lg p-3 mt-2"
                required></textarea>

        </div>

        <div class="mt-8">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

                Simpan Surat

            </button>

        </div>

    </form>

</div>

@endsection