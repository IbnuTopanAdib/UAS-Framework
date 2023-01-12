@extends('layouts.master')
@section('active3', 'active')
@section('judul', 'Masukkan Data')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-10">
                <div class="card-header">
                    Data Mahasiswa
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nama: {{ $mahasiswa->nama }}</li>
                    <li class="list-group-item">NPM: {{ $mahasiswa->npm }}</li>
                    <li class="list-group-item">Jurusan: {{ $mahasiswa->jurusan }}</li>
                    <li class="list-group-item">Keahlian: {{ $mahasiswa->keahlian }}</li>
                    <li class="list-group-item">Pembimbing: {!! $mahasiswa->pembimbing->nama ?? '<b class="text-danger">belum ada pembimbing</b>' !!}</li>
                </ul>
            </div>


        </div>
        <div class="col-md-6">
            <form action="{{ route('mahasiswas.takeStore', ['mahasiswa' => $mahasiswa->npm]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="category" class="form-label">Pembimbing (Keahlian)</label>
                    <select class="form-select" name="pembimbing_id">
                        @foreach ($pembimbings as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }} ({{ $item->bimbingan }})</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-info">Pilih Dosen</button>
            </form>
            <span class="text-danger">*Harap plot pembimbing sesuai dengan keahlian mahasiswa atau minimal
                berhubungan</span>
        </div>
    </div>

@endsection
