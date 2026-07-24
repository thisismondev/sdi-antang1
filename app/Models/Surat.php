<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'nomor_surat',
    'nama_siswa',
    'nis',
    'kelas',
    'tanggal_surat',
    'tanggal_sakit',
    'lama_izin',
    'jenis_surat',
    'tujuan',
    'keterangan',
    'urgensi',
    'pengirim',
    'nilai_jenis',
    'nilai_urgensi',
    'nilai_pengirim',
    'priority_score',
    'status',
    'lampiran', 
    'file_surat', // tambahkan ini
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}