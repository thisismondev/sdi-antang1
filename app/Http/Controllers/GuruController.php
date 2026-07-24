<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Dashboard Guru
     */
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

        return view('guru.dashboard', compact(
            'jumlahSurat',
            'menunggu',
            'diproses',
            'selesai'
        ));
    }

    /**
     * Riwayat Surat Guru
     */
    public function riwayat()
    {
        $surats = Surat::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('guru.riwayat', compact('surats'));
    }
}