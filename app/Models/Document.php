<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'santri_id',
        'file_kk',
        'file_akta',
        'file_ijazah',
        'file_kip',
        'file_bpjs',
    ];

    public function santriDetail()
    {
        return $this->belongsTo(SantriDetail::class, 'santri_id');
    }
}
