<?php

namespace App\Http\Controllers;

use App\Models\Surat;

class OrangTuaController extends Controller
{
    public function dashboard()
    {
        $jumlahSurat = Surat::where('user_id', auth()->id())->count();

        $menunggu = Surat::where('user_id', auth()->id())
            ->where('status', 'Menunggu')
            ->count();

        $diproses = Surat::where('user_id', auth()->id())
            ->where('status', 'Diproses')
            ->count();

        $selesai = Surat::where('user_id', auth()->id())
            ->where('status', 'Selesai')
            ->count();

        return view('orang_tua.dashboard', compact(
            'jumlahSurat',
            'menunggu',
            'diproses',
            'selesai'
        ));
    }

    public function riwayat()
{
    $surats = Surat::where('user_id', auth()->id())
        ->latest()
        ->paginate(10);

    return view('orang_tua.riwayat', compact('surats'));
}
}