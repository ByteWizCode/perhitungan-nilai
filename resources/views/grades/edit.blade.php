@extends('dashboard.dashboard_master')


@section('content')
    <div class="container">
        <h1>Edit Grade</h1>

        <form action="{{ route('grades.update', $grade->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" value="{{ $grade->nama_mahasiswa }}" required>
            </div>
            <div class="form-group">
                <label for="id_mahasiswa">ID Mahasiswa</label>
                <input type="text" name="id_mahasiswa" id="id_mahasiswa" class="form-control" value="{{ $grade->id_mahasiswa }}" required>
            </div>
            <div class="form-group">
                <label for="nilai_quiz">Nilai Quiz</label>
                <input type="number" name="nilai_quiz" id="nilai_quiz" class="form-control" value="{{ $grade->nilai_quiz }}" required>
            </div>
            <div class="form-group">
                <label for="nilai_tugas">Nilai Tugas</label>
                <input type="number" name="nilai_tugas" id="nilai_tugas" class="form-control" value="{{ $grade->nilai_tugas }}" required>
            </div>
            <div class="form-group">
                <label for="nilai_absensi">Nilai Absensi</label>
                <input type="number" name="nilai_absensi" id="nilai_absensi" class="form-control" value="{{ $grade->nilai_absensi }}" required>
            </div>
            <div class="form-group">
                <label for="nilai_praktik">Nilai Praktik</label>
                <input type="number" name="nilai_praktik" id="nilai_praktik" class="form-control" value="{{ $grade->nilai_praktik }}" required>
            </div>
            <div class="form-group">
                <label for="nilai_uas">Nilai UAS</label>
                <input type="number" name="nilai_uas" id="nilai_uas" class="form-control" value="{{ $grade->nilai_uas }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
