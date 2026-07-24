<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Surat
        $totalSurat = Surat::count();

        $menunggu = Surat::where('status', 'Menunggu')->count();

        $diproses = Surat::where('status', 'Diproses')->count();

        $selesai = Surat::where('status', 'Selesai')->count();

        // Statistik User
        $totalGuru = User::where('role', 'guru')->count();

        $totalOrangTua = User::where('role', 'orang_tua')->count();

        // Priority Scheduling
        $prioritySurat = Surat::orderByDesc('priority_score')
                            ->take(5)
                            ->get();

// Aktivitas Terbaru
$latestSurat = Surat::latest()
    ->take(5)
    ->get();

// Grafik
$chartData = [
    'Jan' => 5,
    'Feb' => 8,
    'Mar' => 6,
    'Apr' => 10,
    'Mei' => 7,
    'Jun' => 9,
];
       return view('dashboard', compact(
    'totalSurat',
    'menunggu',
    'diproses',
    'selesai',
    'totalGuru',
    'totalOrangTua',
    'prioritySurat',
    'latestSurat',
    'chartData'
));
    }
}