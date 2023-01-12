@extends('layouts.master')
@section('judul', 'Daftar Magang')
@section('active1', 'active')

@section('container')
    <a href="/magang/create" class="btn btn-primary mx-10"> Tambah</a>
    @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <th>No</th>
            <th>Judul Magang</th>
            <th>Nama Perushaan</th>
            <th>Kota Perusahaan</th>
            <th>Pekerjaan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($magangs as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul_magang }}</td>
                    <td>{{ $item->nama_pt }}</td>
                    <td>{{ $item->kota }}</td>
                    <td>{{ $item->pekerjaan }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tanggal_mulai)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tanggal_selesai)) }}</td>
                    <td>
                        <div class="d-flex inline-block">
                            <a href="{{ route('magang.show', ['magang' => $item->slug]) }}"
                                class="btn btn-info mx-1">Tampil</a>
                            <a href="{{ route('magang.edit', ['magang' => $item->slug]) }}"
                                class="btn btn-warning mx-1">Edit</a>
                            <form action="{{ route('magang.destroy', ['magang' => $item->slug]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mx-1"
                                    onclick="return confirm('Apakah kamu yakin?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
