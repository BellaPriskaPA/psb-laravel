<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'santri_id',
        'kode_transaksi',
        'jumlah',
        'bukti_bayar',
        'status_verifikasi',
    ];

    protected $dates = [
        'tanggal_bayar',
        'created_at',
        'updated_at',
    ];

    public function santriDetail()
    {
        return $this->belongsTo(SantriDetail::class, 'santri_id');
    }
}
