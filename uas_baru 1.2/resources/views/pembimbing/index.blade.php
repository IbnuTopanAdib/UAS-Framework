@extends('layouts.master')
@section('active2', 'active')
@section('judul', 'Daftar Pembimbing dan Bimbingannya')
@section('container')
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
    <a href="/pembimbing/create" class="btn btn-primary mx-10"> Tambah</a>


    <table class="table table-striped table-hover">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>NIDN</th>
            <th>Jenis Kelamin</th>
            <th>No HP</th>
            <th>Bimbingan</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($pembimbings as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nidn }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->bimbingan }}</td>
                    <td>
                        <div class="d-flex inline-block">
                            <a href="{{ route('pembimbing.edit', ['pembimbing' => $item->nidn]) }}"
                                class="btn btn-warning mx-1">Edit</a>
                            <form action="{{ route('pembimbing.destroy', ['pembimbing' => $item->nidn]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Apakah kamu yakin?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
