<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $table = 'exam_results';

    protected $fillable = [
        'santri_id',
        'exam_id',
        'nilai',
        'status',
    ];

    public function santriDetail()
    {
        return $this->belongsTo(SantriDetail::class, 'santri_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
