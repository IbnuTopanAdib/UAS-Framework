@extends('layouts.master')
@section('active1', 'active')
@section('judul', 'Buat Postingan Magang' )
@section('container')
    <div class="row justify-content-center">


        <div class="col-md-8">
            <form action="{{ route('magang.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class=" mb-3">
                    <label for="judul_magang">Judul Magang</label>
                    <input type="text" name="judul_magang" id="judul_magang" placeholder="Masukkan Judul Magang"
                        class="form-control" value="{{ old('judul_magang') }}">
                    @error('judul_magang')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
                    @error('slug')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="nama_pt">Nama PT</label>
                    <input type="text" name="nama_pt" id="nama_pt" placeholder="Masukkan Nama PT" class="form-control"
                        value="{{ old('nama_pt') }}">
                    @error('nama_pt')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" mb-3">
                    <label for="kota">Kota</label>
                    <input type="text" name="kota" id="kota" placeholder="Masukkan Kota" class="form-control"
                        value="{{ old('kota') }}">
                    @error('kota')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan"
                        class="form-control" value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="tanggal_mulai">Tanggal Mulai Magang</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                        value="{{ old('tanggal_mulai') }}">
                    @error('tanggal_mulai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="tanggal_selesai">Tanggal Selesai Magang</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                        value="{{ old('tanggal_selesai') }}">
                    @error('tanggal_selesai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="rincian">Detail Magang</label>
                    <input id="rincian" value="{{ old('rincian') }}" type="hidden" name="rincian">
                    <trix-editor input="rincian"></trix-editor>
                    @error('rincian')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="syarat">Persyaratan</label>
                    <input id="syarat" value="{{ old('syarat') }}" type="hidden" name="syarat">
                    <trix-editor input="syarat"></trix-editor>
                    @error('syarat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Poster</label>
                    <input type="file" name="poster" id="poster" class="form-control">
                    @error('poster')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>

@endsection
