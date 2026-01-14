<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SantriDetail;
use App\Models\Exam;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SantriController extends Controller
{
    /**
     * Tampilkan halaman awal dengan pengumuman dari database
     */
    public function indexAwal()
    {
        // Ambil pengumuman dari database atau gunakan default
        $announcements = [
            [ 
                'day' => "04", 'month' => "Jan", 'year' => "2026", 'tag' => "INFO TERBARU", 
                'title' => "Pembukaan Pendaftaran Gelombang 3", 
                'desc' => "Pendaftaran gelombang ketiga resmi dibuka mulai hari ini. Segera lengkapi berkas sebelum kuota penuh.",
                'fullContent' => "<p>Pendaftaran gelombang ketiga resmi dibuka mulai hari ini, tanggal 4 Januari 2026. Calon santriwati baru dapat segera mengisi formulir pendaftaran online melalui website resmi PSB 'Aisyiyah Qur`anic Boarding School.</p><p>Kuota terbatas hanya untuk 100 santriwati baru per jenjang (SMP dan SMA). Segera lengkapi berkas administrasi dan lakukan pembayaran biaya pendaftaran sebelum kuota penuh atau masa pendaftaran berakhir pada tanggal 30 Januari 2026.</p>"
            ],
            [ 
                'day' => "20", 'month' => "Feb", 'year' => "2026", 'tag' => "AKADEMIK", 
                'title' => "Jadwal Tes Seleksi Masuk Online", 
                'desc' => "Tes seleksi akademik dan wawancara akan dilaksanakan secara daring. Cek kartu ujian di dashboard.",
                'fullContent' => "<p>Tes seleksi akademik dan wawancara untuk calon santriwati baru akan dilaksanakan secara daring melalui platform Zoom Meeting.</p>"
            ],
        ];

        return view('awal.index', ['announcements' => $announcements]);
    }

    /**
     * Tampilkan kartu pendaftaran santri
     */
    public function kartuPendaftaran()
    {
        // Ambil data santri yang login
        $santri = Auth::user()->santriDetail;
        
        if (!$santri) {
            return redirect()->route('santri.formulir')->with('error', 'Data santri tidak ditemukan');
        }

        // Ambil data mata ujian dari database
        $mataUjianData = Exam::where('active', true)
            ->get()
            ->map(function ($exam) {
                return [
                    'id' => $exam->id,
                    'nama' => $exam->nama_ujian,
                    'kode' => $exam->kode,
                    'waktu' => $exam->jam_mulai . ' - ' . $exam->jam_selesai,
                    'jumlahSoal' => $exam->jumlah_soal . ' Soal',
                    'pengawas' => $exam->pengawas,
                    'materi' => $exam->materi,
                    'link' => $exam->link_ujian,
                    'status' => 'aktif',
                    'waktuAktif' => $exam->tanggal . ', ' . $exam->jam_mulai,
                ];
            })
            ->toArray();

        // Ambil status pembayaran
        $statusPembayaran = $santri->status_pembayaran ?? 'pending'; // pending, success, failed
        $biayaPendaftaran = 250000;

        return view('user_santri.kartu_pendaftaran', [
            'mataUjianData' => $mataUjianData,
            'statusPembayaran' => $statusPembayaran,
            'biayaPendaftaran' => $biayaPendaftaran,
        ]);
    }

    /**
     * Handle santri registration
     */
    public function register(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|size:10|unique:santri_details,nisn',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'sekolah_asal' => 'nullable|string',
            'jenis_pendaftaran' => 'required|in:baru,pindahan',
            'jenjang_pendidikan' => 'required|in:SMP,SMA',
            'jalur_pendaftaran' => 'required|in:mandiri,kader,rekomendasi',
            'status_kader' => 'required_if:jalur_pendaftaran,kader|nullable|string',
            'rekomendasi_dari' => 'required_if:jalur_pendaftaran,rekomendasi|nullable|string',
            'captcha' => 'required|string|min:3',
        ]);

        try {
            // Create user with user-provided password
            $user = User::create([
                'name' => $validated['nama_lengkap'],
                'username' => $validated['nisn'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'santri',
            ]);

            // Create santri detail
            SantriDetail::create([
                'user_id' => $user->id,
                'nisn' => $validated['nisn'],
                'nik_santri' => null, // Will be filled in personal data form
                'nama_lengkap' => $validated['nama_lengkap'],
                'jenis_kelamin' => 'Perempuan', // Locked to Perempuan
                'tempat_lahir' => null, // Will be filled in personal data form
                'tanggal_lahir' => null, // Will be filled in personal data form
                'sekolah_asal' => $validated['sekolah_asal'],
                'jenis_pendaftaran' => $validated['jenis_pendaftaran'],
                'jenjang_pendidikan' => $validated['jenjang_pendidikan'],
                'jalur_pendaftaran' => $validated['jalur_pendaftaran'],
                'status_kader' => $validated['status_kader'] ?? null,
                'rekomendasi_dari' => $validated['rekomendasi_dari'] ?? null,
                'anak_ke' => null,
                'jml_saudara' => null,
                'status_tinggal' => null,
                'alamat_jalan' => null,
                'rt' => null,
                'rw' => null,
                'desa' => null,
                'kecamatan' => null,
                'kabupaten' => null,
                'provinsi' => null,
                'kode_pos' => null,
                'no_kk' => null,
                'nama_kk' => null,
                'status_pendaftaran' => 'Proses',
            ]);

            // Store credentials in session for display on success page
            session(['nisn' => $validated['nisn'], 'password' => $validated['password']]);

            // Redirect to success page
            return redirect()->route('santri.sukses')->with('success', 'Registrasi berhasil!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Handle santri login
     */
    public function login(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to login
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->route('santri.dashboard')->with('success', 'Login berhasil!');
        }

        return redirect()->back()->with('error', 'Username atau password salah!');
    }
}        return redirect()->back()->with('error', 'NISN atau Password salah.');
    }

    /**
     * Handle santri logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('awal.index')->with('success', 'Anda telah logout.');
    }
}
