<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantriDetail extends Model
{
    use HasFactory;

    protected $table = 'santri_details';

    protected $fillable = [
        'user_id',
        'nisn',
        'nik_santri',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'jenjang_pendidikan',
        'sekolah_asal',
        'jenis_pendaftaran',
        'jalur_pendaftaran',
        'status_kader',
        'rekomendasi_dari',
        'anak_ke',
        'jml_saudara',
        'status_tinggal',
        'alamat_jalan',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'no_kk',
        'nama_kk',
        'no_kip',
        'status_pendaftaran',
        'foto_profil',
    ];

    protected $dates = [
        'tanggal_lahir',
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship: Santri Detail belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Santri Detail has many Family Details
     */
    public function familyDetails()
    {
        return $this->hasMany(FamilyDetail::class, 'santri_id');
    }

    /**
     * Relationship: Santri Detail has one Health Detail
     */
    public function healthDetail()
    {
        return $this->hasOne(HealthDetail::class, 'santri_id');
    }

    /**
     * Relationship: Santri Detail has many Documents
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'santri_id');
    }

    /**
     * Relationship: Santri Detail has many Payments
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'santri_id');
    }

    /**
     * Relationship: Santri Detail has many Exam Results
     */
    public function examResults()
    {
        return $this->hasMany(ExamResult::class, 'santri_id');
    }
}
