<?php

namespace App\Http\Controllers;

use App\Models\SantriDetail;
use App\Models\Document;
use App\Models\Exam;
use App\Models\ExamResult;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman cetak dokumen
     */
    public function cetakDokumen()
    {
        // Ambil data dokumen dari database
        $berkasData = Document::all()->map(function ($doc) {
            return [
                'id' => $doc->id,
                'nisn' => $doc->santriDetail->nisn ?? null,
                'nama' => $doc->santriDetail->nama_lengkap ?? null,
                'jenjang' => $doc->santriDetail->jenjang_pendidikan ?? null,
                'tgl_upload' => $doc->created_at->format('d M Y'),
                'formulir_status' => $doc->formulir_status ?? 'Belum Dicek',
                'surat_status' => $doc->surat_status ?? 'Belum Dicek',
                'formulir_file' => $doc->formulir_file,
                'surat_file' => $doc->surat_file,
                'formulir_url' => $doc->formulir_path ? asset('storage/' . $doc->formulir_path) : null,
                'surat_url' => $doc->surat_path ? asset('storage/' . $doc->surat_path) : null,
            ];
        })->toArray();

        return view('admin.cetak_dokumen', ['berkasData' => $berkasData]);
    }

    /**
     * Tampilkan halaman data santri diterima
     */
    public function dataSantriDiterima()
    {
        // Ambil data santri yang diterima dari database
        $santriData = SantriDetail::where('status_pendaftaran', 'Diterima')
            ->with(['familyDetails', 'healthDetails'])
            ->get()
            ->map(function ($santri) {
                return [
                    'id' => $santri->id,
                    'nama' => $santri->nama_lengkap,
                    'nisn' => $santri->nisn,
                    'nik_santri' => $santri->nik_santri,
                    'tempat_lahir_santri' => $santri->tempat_lahir,
                    'tanggal_lahir_santri' => $santri->tanggal_lahir,
                    'jenis_kelamin' => $santri->jenis_kelamin,
                    'agama_santri' => $santri->healthDetails->agama ?? null,
                    'hobi' => $santri->healthDetails->hobi ?? null,
                    'cita_cita' => $santri->healthDetails->cita_cita ?? null,
                    'alamat_jalan' => $santri->alamat_jalan,
                    'rt' => $santri->rt,
                    'rw' => $santri->rw,
                    'kelurahan' => $santri->desa,
                    'kecamatan' => $santri->kecamatan,
                    'kabupaten_kota' => $santri->kabupaten,
                    'provinsi' => $santri->provinsi,
                    'no_hp_santri' => $santri->user->phone ?? null,
                    'nama_ayah' => $santri->familyDetails->nama_ayah ?? null,
                    'nik_ayah' => $santri->familyDetails->nik_ayah ?? null,
                    'nama_ibu' => $santri->familyDetails->nama_ibu ?? null,
                    'nik_ibu' => $santri->familyDetails->nik_ibu ?? null,
                    'nama_wali' => $santri->familyDetails->nama_wali ?? null,
                    'nik_wali' => $santri->familyDetails->nik_wali ?? null,
                    'nomor_pendaftaran' => $santri->user->username,
                    'jalur_program' => $santri->jalur_pendaftaran,
                    'sekolah_asal' => $santri->sekolah_asal,
                    'jenjang' => $santri->jenjang_pendidikan,
                    'status' => 'Diterima',
                    'tahun' => date('Y') . '/' . (date('Y') + 1),
                    'tanggal_diterima' => $santri->updated_at->format('Y-m-d'),
                    'nilai_ujian' => ExamResult::where('santri_id', $santri->id)->avg('nilai') ?? 0,
                ];
            })
            ->toArray();

        return view('admin.data_santri_diterima', ['santriData' => $santriData]);
    }

    /**
     * Tampilkan halaman data santri ditolak
     */
    public function dataSantriDitolak()
    {
        // Ambil data santri yang ditolak dari database
        $santriData = SantriDetail::where('status_pendaftaran', 'Ditolak')
            ->with(['familyDetails', 'healthDetails'])
            ->get()
            ->map(function ($santri) {
                return [
                    'id' => $santri->id,
                    'nama' => $santri->nama_lengkap,
                    'nisn' => $santri->nisn,
                    'nik_santri' => $santri->nik_santri,
                    'tempat_lahir_santri' => $santri->tempat_lahir,
                    'tanggal_lahir_santri' => $santri->tanggal_lahir,
                    'jenis_kelamin' => $santri->jenis_kelamin,
                    'agama_santri' => $santri->healthDetails->agama ?? null,
                    'hobi' => $santri->healthDetails->hobi ?? null,
                    'cita_cita' => $santri->healthDetails->cita_cita ?? null,
                    'alamat_jalan' => $santri->alamat_jalan,
                    'rt' => $santri->rt,
                    'rw' => $santri->rw,
                    'kelurahan' => $santri->desa,
                    'kecamatan' => $santri->kecamatan,
                    'kabupaten_kota' => $santri->kabupaten,
                    'provinsi' => $santri->provinsi,
                    'no_hp_santri' => $santri->user->phone ?? null,
                    'nama_ayah' => $santri->familyDetails->nama_ayah ?? null,
                    'nik_ayah' => $santri->familyDetails->nik_ayah ?? null,
                    'nama_ibu' => $santri->familyDetails->nama_ibu ?? null,
                    'nik_ibu' => $santri->familyDetails->nik_ibu ?? null,
                    'nama_wali' => $santri->familyDetails->nama_wali ?? null,
                    'nik_wali' => $santri->familyDetails->nik_wali ?? null,
                    'nomor_pendaftaran' => $santri->user->username,
                    'jalur_program' => $santri->jalur_pendaftaran,
                    'sekolah_asal' => $santri->sekolah_asal,
                    'jenjang' => $santri->jenjang_pendidikan,
                    'status' => 'Ditolak',
                    'tahun' => date('Y') . '/' . (date('Y') + 1),
                    'tanggal_penolakan' => $santri->updated_at->format('Y-m-d'),
                    'alasan_penolakan' => 'Tidak memenuhi kriteria',
                    'catatan' => '',
                    'nilai_ujian' => ExamResult::where('santri_id', $santri->id)->avg('nilai') ?? 0,
                ];
            })
            ->toArray();

        return view('admin.data_ditolak_cadangan', ['santriData' => $santriData]);
    }

    /**
     * Tampilkan halaman siswa daftar ulang
     */
    public function siswaDatarUlang()
    {
        // Ambil data santri yang diterima dan akan daftar ulang
        $daftarUlangData = SantriDetail::where('status_pendaftaran', 'Diterima')
            ->with(['familyDetails', 'healthDetails'])
            ->get()
            ->map(function ($santri) {
                return [
                    'id' => $santri->id,
                    'nama' => $santri->nama_lengkap,
                    'nisn' => $santri->nisn,
                    'nik_santri' => $santri->nik_santri,
                    'tempat_lahir_santri' => $santri->tempat_lahir,
                    'tanggal_lahir_santri' => $santri->tanggal_lahir,
                    'jenis_kelamin' => $santri->jenis_kelamin,
                    'agama_santri' => $santri->healthDetails->agama ?? null,
                    'hobi' => $santri->healthDetails->hobi ?? null,
                    'cita_cita' => $santri->healthDetails->cita_cita ?? null,
                    'alamat_jalan' => $santri->alamat_jalan,
                    'rt' => $santri->rt,
                    'rw' => $santri->rw,
                    'kelurahan' => $santri->desa,
                    'kecamatan' => $santri->kecamatan,
                    'kabupaten_kota' => $santri->kabupaten,
                    'provinsi' => $santri->provinsi,
                    'no_hp_santri' => $santri->user->phone ?? null,
                    'nama_ayah' => $santri->familyDetails->nama_ayah ?? null,
                    'nik_ayah' => $santri->familyDetails->nik_ayah ?? null,
                    'nama_ibu' => $santri->familyDetails->nama_ibu ?? null,
                    'nik_ibu' => $santri->familyDetails->nik_ibu ?? null,
                    'nama_wali' => $santri->familyDetails->nama_wali ?? null,
                    'nik_wali' => $santri->familyDetails->nik_wali ?? null,
                    'nomor_pendaftaran' => $santri->user->username,
                    'jalur_program' => $santri->jalur_pendaftaran,
                    'sekolah_asal' => $santri->sekolah_asal,
                    'jenjang' => $santri->jenjang_pendidikan,
                    'status_daftar_ulang' => 'Proses',
                    'tanggal_daftar_ulang' => date('Y-m-d'),
                    'pembayaran_daftar_ulang' => 'Belum Lunas',
                    'nominal_daftar_ulang' => 1500000,
                    'tahun' => date('Y') . '/' . (date('Y') + 1),
                    'nilai_ujian' => ExamResult::where('santri_id', $santri->id)->avg('nilai') ?? 0,
                ];
            })
            ->toArray();

        return view('admin.siswa_daftar_ulang', ['daftarUlangData' => $daftarUlangData]);
    }

    /**
     * Tampilkan halaman daftar berkas PSB
     */
    public function daftarBerkasPsb()
    {
        // Ambil data santri dengan berkas dari database
        $berkasData = SantriDetail::with('documents')
            ->get()
            ->map(function ($santri) {
                $docs = $santri->documents ?? collect([]);
                return [
                    'id' => $santri->id,
                    'nama' => $santri->nama_lengkap,
                    'jenjang' => $santri->jenjang_pendidikan,
                    'status' => $santri->status_pendaftaran,
                    'tahun' => date('Y') . '/' . (date('Y') + 1),
                    'jalur' => $santri->jalur_pendaftaran,
                    'berkas' => [
                        'kk' => $docs->where('jenis_dokumen', 'KK')->isNotEmpty(),
                        'ijazah' => $docs->where('jenis_dokumen', 'Ijazah')->isNotEmpty(),
                        'akta' => $docs->where('jenis_dokumen', 'Akta')->isNotEmpty(),
                        'kip' => $docs->where('jenis_dokumen', 'KIP')->isNotEmpty(),
                        'bpjs' => $docs->where('jenis_dokumen', 'BPJS')->isNotEmpty(),
                    ],
                ];
            })
            ->toArray();

        return view('admin.daftar_berkas_psb', ['berkasData' => $berkasData]);
    }
}
