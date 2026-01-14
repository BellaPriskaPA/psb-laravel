<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthDetail extends Model
{
    use HasFactory;

    protected $table = 'health_details';

    protected $fillable = [
        'santri_id',
        'prestasi',
        'alergi',
        'penyakit_dalam',
    ];

    public function santriDetail()
    {
        return $this->belongsTo(SantriDetail::class, 'santri_id');
    }
}
