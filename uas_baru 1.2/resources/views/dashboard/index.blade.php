@extends('layouts.master')
@section('active0', 'active')
@section('judul', 'Dashboard')
@section('container')

    <div class="row">
        <div class="col-md-6">
        <div class="card-columns ">
            <div class="card mb-3">
                <div class="card-header">
                    Postingan Magang Terbaru
                </div>
                <div class="card-body">
                    <h5 class="card-title">Postingan Terbaru</h5>
                    <p class="card-text">judul magang: {{ $latest_magang[0]->judul_magang }}</p>
                    <p class="card-text">perusahaan: {{ $latest_magang[0]->nama_pt }}</p>
                    <p class="card-text">pekerjaan yang dibutuhkan: {{ $latest_magang[0]->pekerjaan}}</p>
                    <a href="/magang/" class="btn btn-primary">Detail..</a>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    Dosen Pembimbing
                </div>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Dosen Pembimbing</h5>
                    <p class="card-text">{{ $jumlah_pembimbing }} Dosen Pembimbing</p>
                    <a href="/pembimbing/" class="btn btn-primary">Detail..</a>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                Mahasiswa
            </div>
            <div class="card-body">
                <h5 class="card-title">Jumlah Mahasiswa Magang</h5>
                <p class="card-text">{{ $jumlah_mahasiswa }} Mahasiswa</p>
                <a href="/mahasiswa/" class="btn btn-primary">Detail..</a>
            </div>
        </div>
    </div>
        
        <div class="col-md-5">
            <h5 class="text-center">Mahasiswa Yang Punya Pembimbing dan Tidak Punya Pembimbing</h5>
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
    </div>
   




@endsection
@section('footer')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Tidak punya pembimbing', 'Punya pembimbing'],
                datasets: [{
                    label: 'Data',
                    data: [{{ $null_data }}, {{ $not_null_data }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>



@endsection
