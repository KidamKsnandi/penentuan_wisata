@extends('layouts.admin')

@section('ckeditor')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var konten = document.getElementById("konten");
        CKEDITOR.replace(konten, {
            language: 'en-gb'
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
                            <h3 class="col-sm-10">Data Artikel</h3>
                            <a href="/author/artikel" class="fa fa-arrow-left btn btn-secondary">&nbsp;Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Judul</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="judul" value="{{ $artikel->judul }}"
                                        class="form-control @error('judul') is-invalid @enderror">
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Cover</label>
                                <br>
                                <img src="{{ $artikel->cover() }}" height="75" style="padding:10px;" />
                                <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="">Konten</label>
                                <div class="input-group input-group-outline">
                                    <textarea name="konten" id="konten" rows="30" cols="50"
                                        class="form-control @error('konten') is-invalid @enderror">{{ $artikel->konten }}</textarea>
                                    @error('konten')
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
