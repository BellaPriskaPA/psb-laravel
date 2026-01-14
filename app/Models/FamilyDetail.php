<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyDetail extends Model
{
    use HasFactory;

    protected $table = 'family_details';

    protected $fillable = [
        'santri_id',
        'type',
        'nama',
        'pekerjaan',
        'hp',
    ];

    protected $dates = [
        'tanggal_lahir',
        'created_at',
        'updated_at',
    ];

    public function santriDetail()
    {
        return $this->belongsTo(SantriDetail::class, 'santri_id');
    }
}
