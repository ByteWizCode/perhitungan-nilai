@extends('dashboard.dashboard_master')

@section('content')
    <div class="container">
        <h1>Grades</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('grades.create') }}" class="btn btn-primary mb-3">Tambah Grade</a>

        <div class="row">
            <div class="col-md-6">
                <canvas id="gradeChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="gradePieChart"></canvas>
            </div>
        </div>

        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th >No.</th>
                    <th>Nama Mahasiswa</th>
                    <th>ID Mahasiswa</th>
                    <th>Nilai Quiz</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai Absensi</th>
                    <th>Nilai Praktik</th>
                    <th>Nilai UAS</th>
                    <th>Nilai Akhir</th>
                    <th>Grade Akhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $number = 1;
                @endphp
                @foreach ($grades as $grade)
                    <tr>
                        <td >{{ $number++ }}</td>
                        <td>{{ $grade->nama_mahasiswa }}</td>
                        <td>{{ $grade->id_mahasiswa }}</td>
                        <td>{{ $grade->nilai_quiz }}</td>
                        <td>{{ $grade->nilai_tugas }}</td>
                        <td>{{ $grade->nilai_absensi }}</td>
                        <td>{{ $grade->nilai_praktik }}</td>
                        <td>{{ $grade->nilai_uas }}</td>
                        <td>{{ $grade->nilai_akhir }}</td>
                        <td>{{ $grade->grade_akhir }}</td>
                        <td>
                            <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus grade ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var grades = [];
        var gradeLabels = [];

        @foreach ($grades as $grade)
            grades.push({{ $grade->nilai_akhir }});
            gradeLabels.push("{{ $grade->nama_mahasiswa }}");
        @endforeach

        var ctx = document.getElementById('gradeChart').getContext('2d');
        var gradeChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: gradeLabels,
                datasets: [{
                    label: 'Grade Akhir',
                    data: grades,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var gradeCounts = {
            A: 0,
            B: 0,
            C: 0,
            D: 0
        };

        @foreach ($grades as $grade)
            gradeCounts["{{ $grade->grade_akhir }}"]++;
        @endforeach

        var gradeLabelsPie = Object.keys(gradeCounts).map(function(grade) {
    return "Grade " + grade;
});
        var gradeDataPie = Object.values(gradeCounts);

        var ctxPie = document.getElementById('gradePieChart').getContext('2d');
        var gradePieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: gradeLabelsPie,
                datasets: [{
                    data: gradeDataPie,
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 205, 86, 0.5)', 'rgba(75, 192, 192, 0.5)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 205, 86, 1)', 'rgba(75, 192, 192, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                elements: {
                    arc: {
                        borderWidth: 1,
                        borderColor: '#fff'

                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
@endsection
