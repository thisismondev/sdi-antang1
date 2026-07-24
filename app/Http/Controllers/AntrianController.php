<?php

namespace App\Http\Controllers;

use App\Models\Surat;

class AntrianController extends Controller
{
    public function index()
    {
        $antrian = Surat::orderBy('priority_score')
                        ->orderBy('created_at')
                        ->get();

        return view('antrian.index', compact('antrian'));
    }
}