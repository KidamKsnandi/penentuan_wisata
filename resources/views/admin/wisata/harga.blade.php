@extends('layouts.admin')

@section('ckeditor')
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
    var harga_tiket = document.getElementById("harga_tiket");
        CKEDITOR.replace(harga_tiket,{
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
                    <h3 class="col-sm-10">Harga Tiket Wisata {{ $wisata->nama_wisata }}</h3>
                    <a href="javascript:history.back()" class="fa fa-arrow-left btn btn-secondary">&nbsp;Kembali</a>
                </div>
                </div>
                <div class="card-body">
                    <form action="harga/simpan" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Harga Tiket<small class="text-muted">(Minimal 50 karakter)</small></label>
                            <div class="input-group input-group-outline">
                            <textarea name="harga_tiket" id="harga_tiket" rows="30" cols="50" class="form-control @error('harga_tiket') is-invalid @enderror">{{ $wisata->harga_tiket }}</textarea>
                            @error('harga_tiket')
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
