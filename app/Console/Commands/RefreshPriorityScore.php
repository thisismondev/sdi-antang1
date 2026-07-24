<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Surat;

class RefreshPriorityScore extends Command
{
    protected $signature = 'priority:refresh';

    protected $description = 'Menghitung ulang seluruh Priority Score surat';

    public function handle()
    {
        $this->info('Menghitung ulang Priority Score...');

        $surats = Surat::all();

        foreach ($surats as $surat) {

            $nilaiJenis = match ($surat->jenis_surat) {

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

            $nilaiUrgensi = match ($surat->urgensi) {

                'Tinggi' => 1,

                'Sedang' => 2,

                default => 3,

            };

            $nilaiPengirim = match ($surat->pengirim) {

                'Guru' => 1,

                'Orang Tua' => 2,

                default => 3,

            };

            $priorityScore =

                $nilaiJenis +
                $nilaiUrgensi +
                $nilaiPengirim;

            $surat->update([

                'nilai_jenis' => $nilaiJenis,
                'nilai_urgensi' => $nilaiUrgensi,
                'nilai_pengirim' => $nilaiPengirim,
                'priority_score' => $priorityScore,

            ]);

            $this->line(
                $surat->nomor_surat .
                ' => ' .
                $priorityScore
            );
        }

        $this->info('=================================');
        $this->info('SEMUA PRIORITY SCORE BERHASIL DIPERBARUI');
        $this->info('=================================');

        return Command::SUCCESS;
    }
}