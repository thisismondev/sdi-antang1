<?php

namespace App\Http\Controllers;

use App\Models\Surat;

class LaporanController extends Controller
{
    public function index()
    {
        $surats = Surat::orderBy('priority_score', 'desc')->get();

        return view('laporan.index', compact('surats'));
    }
}