<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'mata_pelajaran',
        'passing_grade',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }

    public function examResults()
    {
        return $this->hasMany(ExamResult::class, 'exam_id');
    }
}
