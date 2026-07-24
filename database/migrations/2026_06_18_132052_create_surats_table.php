<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {

            $table->id();

            // Relasi ke tabel users
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Informasi Surat
            $table->string('nomor_surat')->unique()->nullable();

            $table->enum('jenis_surat', [
                'Izin Sakit',
                'Surat Tugas',
                'Memo',
                'Dispensasi',
                'Lainnya'
            ]);

            // Data Siswa (untuk surat dari orang tua)
            $table->string('nama_siswa')->nullable();

            $table->string('nis')->nullable();

            $table->string('kelas')->nullable();

            // Data Surat
            $table->date('tanggal_surat');

            $table->date('tanggal_sakit')->nullable();

            $table->integer('lama_izin')->nullable();

            $table->text('keterangan');

            $table->string('lampiran')->nullable();

            // Priority Scheduling
            $table->enum('urgensi', [
                'Tinggi',
                'Sedang',
                'Rendah'
            ]);

            $table->enum('pengirim', [
                'Guru',
                'Orang Tua'
            ]);

            $table->integer('nilai_jenis')->default(0);

            $table->integer('nilai_urgensi')->default(0);

            $table->integer('nilai_pengirim')->default(0);

            $table->integer('priority_score')->default(0);

            // Status Surat
            $table->enum('status', [
                'Menunggu',
                'Diproses',
                'Selesai'
            ])->default('Menunggu');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};