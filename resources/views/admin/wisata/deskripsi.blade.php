@extends('layouts.admin')

@section('ckeditor')
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
    var deskripsi_wisata = document.getElementById("deskripsi_wisata");
        CKEDITOR.replace(deskripsi_wisata,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <h3 class="col-sm-10">Deskripsi Wisata {{ $wisata->nama_wisata }}</h3>
                    <a href="javascript:history.back()" class="fa fa-arrow-left btn btn-secondary">&nbsp;Kembali</a>
                </div>
                </div>
                <div class="card-body">
                    <form action="deskripsi/simpan" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Deskripsi Wisata <small class="text-muted">(Minimal 200 karakter)</small></label>
                            <div class="input-group input-group-outline">
                            <textarea name="deskripsi_wisata" id="deskripsi_wisata" rows="30" cols="50" class="form-control @error('deskripsi_wisata') is-invalid @enderror">{{ $wisata->deskripsi_wisata }}</textarea>
                            @error('deskripsi_wisata')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-block btn-info text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
