@extends('layouts.master')
@section('judul', 'Detail Postingan Magang')
@section('active1', 'active')
@section('container')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex inline-block my-2">
                <a href="/magang" class="btn btn-primary mx-1">Kembali</a>
                <a href="{{ route('magang.edit', ['magang' => $magang->slug]) }}" class="btn btn-warning mx-1">Edit</a>
                <form action="{{ route('magang.destroy', ['magang' => $magang->slug]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger mx-1"
                        onclick="return confirm('Apakah kamu yakin?')">Hapus</button>
                </form>
            </div>
            <h1>{{ $magang->judul_magang }}</h1>
            <img src="{{ asset('storage/' . $magang->poster) }}" alt="poster" class="card-img-top img-fluid">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h5>Pekerjaan yang dibutuhkan: {{ $magang->pekerjaan }}</h5>
                <p>{{ $magang->nama_pt }}</p>
                <p>{{ $magang->kota }}</p>
                <p>{{ $magang->sks }}</p>
            </div>
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <p>Periode kegiatan: {{ $magang->tanggal_mulai }} sampai {{ $magang->tanggal_selesai }}</p>
            </div>
            <h3>Rincian Magang</h3>
            <article class="my-3">
                {!! $magang->rincian !!}
            </article>
            <h3>Persyaratan</h3>
            <article class="my-3">
                {!! $magang->syarat !!}
            </article>

        </div>
    </div>





@endsection
