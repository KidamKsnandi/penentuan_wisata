@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <h3 class="col-sm-10">Data Galeri {{ $wisata->nama_wisata }}</h3>
                    <a href="javascript:history.back()" class="fa fa-arrow-left btn btn-secondry" class="float:right;">&nbsp;Kembali</a>
                    </div>


                </div>
                <div class="card-body">

                    <form action="store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <div class="input-group input-group-outline">
                            <input type="file" name="gambar[]" class="form-control @error('gambar') is-invalid @enderror" multiple>
                            @error('gambar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <button type="reset" class="btn btn-danger text-white"><i class="fa fa-sync"></i> Reset</button>
                            <button type="submit" class="btn btn-info text-white"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
