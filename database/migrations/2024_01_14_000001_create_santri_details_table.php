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
        Schema::create('santri_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nisn', 10)->unique();
            $table->string('nik_santri', 16)->unique();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('anak_ke')->nullable();
            $table->integer('jml_saudara')->nullable();
            $table->string('jenjang_pendidikan'); // SMP/SMA
            
            // Pendaftaran Info
            $table->string('sekolah_asal')->nullable();
            $table->enum('jenis_pendaftaran', ['baru', 'pindahan'])->default('baru');
            $table->enum('jalur_pendaftaran', ['mandiri', 'kader', 'rekomendasi'])->default('mandiri');
            $table->string('status_kader')->nullable();
            $table->string('rekomendasi_dari')->nullable();
            
            // Alamat & Domisili
            $table->string('status_tinggal')->nullable();
            $table->text('alamat_jalan')->nullable();
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos', 5)->nullable();
            
            // Data Kependudukan
            $table->string('no_kk', 16)->nullable();
            $table->string('nama_kk')->nullable();
            $table->string('no_kip')->nullable();
            
            // Status Sistem
            $table->enum('status_pendaftaran', ['Proses', 'Diterima', 'Cadangan', 'Ditolak'])->default('Proses');
            $table->string('foto_profil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri_details');
    }
};
