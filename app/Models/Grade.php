<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_mahasiswa',
        'id_mahasiswa',
        'nilai_quiz',
        'nilai_tugas',
        'nilai_absensi',
        'nilai_praktik',
        'nilai_uas',
        'nilai_akhir',
        'grade_akhir',
    ];
}
