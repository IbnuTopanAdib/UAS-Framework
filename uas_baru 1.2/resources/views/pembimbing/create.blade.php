@extends('layouts.master')
@section('active2', 'active')
@section('judul', 'Masukkan Data Pembimbng')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{route("pembimbing.store")}}" method="POST">
            @csrf
            <div class=" mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" class="form-control" value="{{old('nama')}}">
                @error('nama')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class=" mb-3">
                <label for="nidn">NIDN</label>
                <input type="text" name="nidn" id="nidn" placeholder="Masukkan NIDN" class="form-control" value="{{old('nidn')}}">
                @error('nidn')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class=" mb-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                    <option value="laki-laki" {{old('jenis_kelamin')=="laki-laki"? "selected" : " "}}>Laki-laki</option>
                    <option value="perempuan" {{old('jenis_kelamin')=="perempuan"? "selected" : " "}}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
          
            <div class=" mb-3">
                <label for="no_hp">No Hp Aktif</label>
                <input type="text" name="no_hp" id="no_hp" placeholder="Masukkan no Hp" class="form-control" value="{{old('no_hp')}}">
                @error('no_hp')
                    <div class="text-danger">{{$message}}</div>
                @enderror
           </div>
            <div class=" mb-3">
                <label for="bimbingan">Bimbingan</label>
                <input type="text" name="bimbingan" id="bimbingan" placeholder="Masukkan bimbingan" class="form-control" value="{{old('bimbingan')}}">
                @error('bimbingan')
                    <div class="text-danger">{{$message}}</div>
                @enderror
           </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

@endsection
