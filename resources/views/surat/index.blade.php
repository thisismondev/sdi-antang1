@extends('layouts.main')

@section('title','Data Surat')

@section('content')

<div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-8 mb-8">

    <div class="flex items-center justify-between">

        <div class="flex items-center gap-5">

            <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">

                📄

            </div>

            <div>

                <h1 class="text-4xl font-bold text-slate-800">
                    Data Surat
                </h1>

                <p class="text-slate-500 mt-1">
                    Kelola seluruh data surat pada sistem persuratan sekolah.
                </p>

            </div>

        </div>

        <a href="{{ route('surat.create') }}"
           class="bg-blue-600 hover:bg-blue-700 duration-200 text-white px-6 py-3 rounded-xl shadow-lg">

            ＋ Tambah Surat

        </a>

    </div>

</div>


<div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden">


<div class="flex items-center justify-between p-6 border-b bg-slate-50">

       <div class="relative">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="absolute left-4 top-3.5 h-5 w-5 text-gray-400"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z"/>

        </svg>

        <input
            type="text"
            placeholder="Cari surat..."
            class="pl-12 w-80 h-12 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

    </div>

    <div class="text-slate-600">

        Total :
        <span class="font-bold text-blue-700">

            {{ $surats->count() }}

        </span>

        Surat

    </div>

</div>
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr class="text-gray-700">

                <th class="p-4">No</th>

                <th>Nomor Surat</th>

                <th>Nama</th>

                <th>Jenis</th>

                <th>Priority</th>

                <th>Arrival Time</th>

                <th>Status</th>

                <th>Tanggal</th>

                <th width="220">
                    Aksi
                </th>

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

                    {{ $surat->nama_siswa }}

                </td>

                <td>

                    {{ $surat->jenis_surat }}

                </td>

                <td>

                   @if($surat->priority_score <= 5)

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
    {{ $surat->priority_score }}
</span>

@elseif($surat->priority_score <= 8)

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
    {{ $surat->priority_score }}
</span>

@else

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
    {{ $surat->priority_score }}
</span>

@endif

                </td>

                <td>
                 {{ $surat->created_at->format('H:i') }}
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

                    {{ $surat->tanggal_surat }}

                </td>

                <td>

                   <div class="flex gap-2">

    <a
        href="{{ route('surat.show',$surat) }}"
        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded">
        👁
    </a>

    @if(auth()->user()->role == 'admin')

        <a
            href="{{ route('surat.edit',$surat) }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">
            ✏
        </a>

        <form
            action="{{ route('surat.destroy',$surat) }}"
            method="POST">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Yakin ingin menghapus?')"
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                🗑
            </button>

        </form>

    @endif

</div>

                </td>

            </tr>

            @empty

            <tr>

                <td
                    colspan="9"
                    class="text-center py-10 text-gray-500">

                    Belum ada data surat.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="p-5">

        {{ $surats->links() }}

    </div>

</div>

@endsection