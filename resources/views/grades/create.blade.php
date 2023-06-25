@extends('dashboard.dashboard_master')

@section('content')
    <div class="container">
        <h1>Tambah Grade</h1>

        <form action="{{ route('grades.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_mahasiswa">ID Mahasiswa</label>
                <input type="text" name="id_mahasiswa" id="id_mahasiswa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nilai_quiz">Nilai Quiz</label>
                <input type="number" name="nilai_quiz" id="nilai_quiz" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nilai_tugas">Nilai Tugas</label>
                <input type="number" name="nilai_tugas" id="nilai_tugas" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nilai_absensi">Nilai Absensi</label>
                <input type="number" name="nilai_absensi" id="nilai_absensi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nilai_praktik">Nilai Praktik</label>
                <input type="number" name="nilai_praktik" id="nilai_praktik" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nilai_uas">Nilai UAS</label>
                <input type="number" name="nilai_uas" id="nilai_uas" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
