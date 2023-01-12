@extends('layouts.master')
@section('active3', 'active')
@section('judul', 'Daftar Mahasiswa dan Pembimbing')
@section('container')

    <table class="table table-striped table-hover">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <th>Keahlian</th>
            <th>Pembimbing</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td>{{ $item->keahlian }}</td>
                    <td>{!! $item->pembimbing->nama ?? '<b class="text-danger">belum ada pembimbing</b>' !!}</td>
                    <td>
                        <a href="{{ route('mahasiswas.take', $item->npm) }}" class="btn btn-info">Pilih pembimbing</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
