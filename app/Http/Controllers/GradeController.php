<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'id_mahasiswa' => 'required',
            'nilai_quiz' => 'required|numeric',
            'nilai_tugas' => 'required|numeric',
            'nilai_absensi' => 'required|numeric',
            'nilai_praktik' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
        ]);

        $grade = new Grade();
        $grade->nama_mahasiswa = $request->nama_mahasiswa;
        $grade->id_mahasiswa = $request->id_mahasiswa;
        $grade->nilai_quiz = $request->nilai_quiz;
        $grade->nilai_tugas = $request->nilai_tugas;
        $grade->nilai_absensi = $request->nilai_absensi;
        $grade->nilai_praktik = $request->nilai_praktik;
        $grade->nilai_uas = $request->nilai_uas;
        $grade->nilai_akhir = ($request->nilai_quiz + $request->nilai_tugas + $request->nilai_absensi + $request->nilai_praktik + $request->nilai_uas) / 5;

        if ($grade->nilai_akhir <= 65) {
            $grade->grade_akhir = 'D';
        } elseif ($grade->nilai_akhir <= 75) {
            $grade->grade_akhir = 'C';
        } elseif ($grade->nilai_akhir <= 85) {
            $grade->grade_akhir = 'B';
        } else {
            $grade->grade_akhir = 'A';
        }

        $grade->save();

        return redirect()->route('grades.index')->with('success', 'Grade berhasil disimpan.');
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'id_mahasiswa' => 'required',
            'nilai_quiz' => 'required|numeric',
            'nilai_tugas' => 'required|numeric',
            'nilai_absensi' => 'required|numeric',
            'nilai_praktik' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
        ]);

        $grade->nama_mahasiswa = $request->nama_mahasiswa;
        $grade->id_mahasiswa = $request->id_mahasiswa;
        $grade->nilai_quiz = $request->nilai_quiz;
        $grade->nilai_tugas = $request->nilai_tugas;
        $grade->nilai_absensi = $request->nilai_absensi;
        $grade->nilai_praktik = $request->nilai_praktik;
        $grade->nilai_uas = $request->nilai_uas;
        $grade->nilai_akhir = ($request->nilai_quiz + $request->nilai_tugas + $request->nilai_absensi + $request->nilai_praktik + $request->nilai_uas) / 5;

        if ($grade->nilai_akhir <= 65) {
            $grade->grade_akhir = 'D';
        } elseif ($grade->nilai_akhir <= 75) {
            $grade->grade_akhir = 'C';
        } elseif ($grade->nilai_akhir <= 85) {
            $grade->grade_akhir = 'B';
        } else {
            $grade->grade_akhir = 'A';
        }

        $grade->save();

        return redirect()->route('grades.index')->with('success', 'Grade berhasil diperbarui.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Grade berhasil dihapus.');
    }
}
