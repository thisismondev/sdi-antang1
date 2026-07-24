<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    /**
     * Menampilkan daftar surat
     */
   public function index()
{
    if (auth()->user()->role == 'admin') {

        $surats = Surat::orderBy('priority_score')
                       ->orderBy('created_at')
                       ->paginate(10);

    } else {

        $surats = Surat::where('user_id', auth()->id())
                       ->latest()
                       ->paginate(10);

    }

    return view('surat.index', compact('surats'));
}
    /**
     * Form tambah surat
     */
    public function create()
{
    if (auth()->user()->role == 'guru') {
        return view('guru.create');
    }

    if (auth()->user()->role == 'orang_tua') {
        return view('orang_tua.create');
    }

    abort(403);
}
    /**
     * Simpan surat baru
     */
    public function store(Request $request)
    {
       
        $request->validate([
           'nomor_surat' => 'required|unique:surats',
           'nama_siswa' => auth()->user()->role == 'orang_tua' ? 'required' : 'nullable',
            'nis' => auth()->user()->role == 'orang_tua' ? 'required' : 'nullable',
            'kelas' => auth()->user()->role == 'orang_tua' ? 'required' : 'nullable',
            'tanggal_surat' => 'required',
            'tanggal_sakit' => 'nullable',
            'lama_izin'     => 'nullable',
            'jenis_surat'   => 'required',
            'tujuan'        => 'required',
            'urgensi'       => 'required',
            'pengirim'      => 'required',
            'keterangan'    => 'required',
            'lampiran' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // ===============================
        // HITUNG PRIORITY SCORE
        // ===============================

        $nilaiJenis = match ($request->jenis_surat) {

    'Surat Masuk' => 1,
    'Surat Keluar' => 2,

    'Dokumen Dana BOS' => 2,

    'Surat Pindah Masuk' => 3,
    'Surat Pindah Keluar' => 3,

    'Rekap Nilai' => 4,
    'Dokumen Kurikulum' => 4,

    'Surat Izin Guru' => 5,
    'Surat Izin Siswa' => 5,
    'Surat Keterangan Aktif Sekolah' => 5,
    'Surat Izin Lomba' => 5,

    'Dokumen Inovasi' => 6,
    'Dokumen Adiwiyata' => 6,
    'Dokumen Rapat' => 6,

    'Daftar Hadir PTK' => 7,
    'Daftar Hadir Siswa' => 7,

    'Buku Kunjungan Tamu' => 8,

    default => 9,
};

        $nilaiUrgensi = match ($request->urgensi) {
            'Tinggi' => 1,
            'Sedang' => 2,
            default  => 3,
        };

        $nilaiPengirim = match ($request->pengirim) {
            'Guru'      => 1,
            'Orang Tua' => 2,
            default     => 3,
        };

        $priorityScore = $nilaiJenis + $nilaiUrgensi + $nilaiPengirim;

       

        // ===============================
        // Simpan Database
        // ===============================

     try {

    $lampiran = null;

    if ($request->hasFile('lampiran')) {
        $lampiran = $request->file('lampiran')
                            ->store('lampiran', 'public');
    }

    Surat::create([
        'user_id' => auth()->id(),
        'nomor_surat' => $request->nomor_surat,
        'nama_siswa' => $request->nama_siswa,
        'nis' => $request->nis,
        'kelas' => $request->kelas,
        'tanggal_surat' => $request->tanggal_surat,
        'tanggal_sakit' => $request->tanggal_sakit,
        'lama_izin' => $request->lama_izin,
        'jenis_surat' => $request->jenis_surat,
        'tujuan' => $request->tujuan,
        'urgensi' => $request->urgensi,
        'pengirim' => $request->pengirim,
        'keterangan' => $request->keterangan,
        'lampiran' => $lampiran,
        'nilai_jenis' => $nilaiJenis,
        'nilai_urgensi' => $nilaiUrgensi,
        'nilai_pengirim' => $nilaiPengirim,
        'priority_score' => $priorityScore,
        'status' => 'Menunggu',
    ]);

   

}  catch (\Exception $e) {

    return back()
        ->withInput()
        ->with('error', 'Terjadi kesalahan saat menyimpan surat.');

}

if(auth()->user()->role == 'orang_tua'){

    return redirect()
    ->route('surat.index')
    ->with('success','Surat berhasil diajukan.');
}

return redirect()->route('surat.index');
    }

    /**
     * Detail surat
     */
    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    /**
     * Form edit
     */
    public function edit(Surat $surat)
    {
        return view('surat.edit', compact('surat'));
    }
public function update(Request $request, Surat $surat)
{
    $request->validate([
        'nomor_surat' => 'required|unique:surats,nomor_surat,' . $surat->id,
        'nama_siswa' => 'required',
        'nis' => 'required',
        'kelas' => 'required',
        'tanggal_surat' => 'required',
        'tanggal_sakit' => 'nullable',
        'lama_izin' => 'nullable',
        'jenis_surat' => 'required',
        'tujuan' => 'required',
        'urgensi' => 'required',
        'pengirim' => 'required',
        'keterangan' => 'required',
        'lampiran' => 'nullable|file|mimes:pdf|max:2048',
    ]);

    $nilaiJenis = match ($request->jenis_surat) {
    'Surat Masuk' => 1,
    'Surat Keluar' => 2,
    'Dokumen Dana BOS' => 2,
    'Surat Pindah Masuk' => 3,
    'Surat Pindah Keluar' => 3,
    'Rekap Nilai' => 4,
    'Dokumen Kurikulum' => 4,
    'Surat Izin Guru' => 5,
    'Surat Izin Siswa' => 5,
    'Surat Keterangan Aktif Sekolah' => 5,
    'Surat Izin Lomba' => 5,
    'Dokumen Inovasi' => 6,
    'Dokumen Adiwiyata' => 6,
    'Dokumen Rapat' => 6,
    'Daftar Hadir PTK' => 7,
    'Daftar Hadir Siswa' => 7,
    'Buku Kunjungan Tamu' => 8,
    default => 9,
};
    $nilaiUrgensi = match ($request->urgensi) {
        'Tinggi' => 1,
        'Sedang' => 2,
        default => 3,
    };
    $nilaiPengirim = match ($request->pengirim) {
        'Guru' => 1,
        'Orang Tua' => 2,
        default => 3,
    };
    $priorityScore = $nilaiJenis + $nilaiUrgensi + $nilaiPengirim;

if ($request->hasFile('lampiran')) {

    if ($surat->lampiran &&
        Storage::disk('public')->exists($surat->lampiran)) {

        Storage::disk('public')->delete($surat->lampiran);
    }

    $lampiran = $request->file('lampiran')
                        ->store('lampiran','public');

} else {

    $lampiran = $surat->lampiran;

}

    $surat->update([

        'nomor_surat' => $request->nomor_surat,
        'nama_siswa' => $request->nama_siswa,
        'nis' => $request->nis,
        'kelas' => $request->kelas,
        'tanggal_surat' => $request->tanggal_surat,
        'tanggal_sakit' => $request->tanggal_sakit,
        'lama_izin' => $request->lama_izin,
        'jenis_surat' => $request->jenis_surat,
        'tujuan' => $request->tujuan,
        'urgensi' => $request->urgensi,
        'pengirim' => $request->pengirim,
        'keterangan' => $request->keterangan,
        'lampiran' => $lampiran,
        'nilai_jenis' => $nilaiJenis,
        'nilai_urgensi' => $nilaiUrgensi,
        'nilai_pengirim' => $nilaiPengirim,
        'priority_score' => $priorityScore,

    ]);

    return redirect()
        ->route('surat.show',$surat)
        ->with('success','Data surat berhasil diperbarui.');
}

     public function uploadSurat(Request $request, Surat $surat)
{
    $request->validate([
        'file_surat' => 'required|file|mimes:pdf|max:2048',
    ]);

    // Hapus file lama jika ada
    if ($surat->file_surat && Storage::disk('public')->exists($surat->file_surat)) {
        Storage::disk('public')->delete($surat->file_surat);
    }

    // Upload file baru
    $file = $request->file('file_surat')->store('surat', 'public');

    // Simpan ke database
    $surat->update([
        'file_surat' => $file,
    ]);

    return redirect()
        ->route('surat.show', $surat)
        ->with('success', 'File surat berhasil diupload.');
}
/**
 * Update status surat
 */
public function updateStatus(Request $request, Surat $surat)
{
    $request->validate([
        'status' => 'required|in:Menunggu,Diproses,Selesai',
    ]);

    $surat->update([
        'status' => $request->status,
    ]);

    return back()->with('success', 'Status surat berhasil diperbarui.');
}
        
public function riwayatOrtu()
{
    $surats = Surat::where('user_id', auth()->id())
                    ->latest()
                    ->get();

    return view('ortu.riwayat', compact('surats'));
}

    /**
     * Hapus surat
     */
    public function destroy(Surat $surat)
{
   if ($surat->file_surat &&
    Storage::disk('public')->exists($surat->file_surat)) {

    Storage::disk('public')->delete($surat->file_surat);
}

if ($surat->lampiran &&
    Storage::disk('public')->exists($surat->lampiran)) {

    Storage::disk('public')->delete($surat->lampiran);
}

$surat->delete();

    return redirect()
        ->route('surat.index')
        ->with('success', 'Surat berhasil dihapus.');
}
}