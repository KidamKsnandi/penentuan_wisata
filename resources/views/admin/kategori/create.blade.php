@extends('layouts.admin')

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        $('.addkategori').on('click', function() {
            addkategori();
        });

        function addkategori() {
            var kategori =
                '<div><div class="form-group mt-6"><label for="">Nama Kategori</label><div class="input-group input-group-outline"><input type="text" name="nama_kategori[]" autocomplete="off" class="form-control @error('nama_kategori.*') is-invalid @enderror">@error('nama_kategori')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror</div></div><div class="form-group"> @csrf<label for="">Latar Belakang</label><input type="file" name="background[]" class="form-control @error('background.*') is-invalid @enderror">@error('background.*')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div><div class="form-group mt-3"><a href="#" class="remove btn btn-danger" style="float: right;"><i class="fa fa-trash-alt"></i> Hapus</a></div></div>';
            $('.kategori').append(kategori);
        };
        $('.remove').live('click', function() {
            $(this).parent().parent().remove();
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="col-sm-10">Data Kategori</h3>
                            <a href="/admin/kategori" class="fa fa-arrow-left btn btn-secondary">&nbsp;Kembali</a>
                        </div>


                    </div>
                    <div class="card-body">

                        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="nama_kategori[]" autocomplete='off'
                                        class="form-control @error('nama_kategori.*') is-invalid @enderror">
                                    @error('nama_kategori.*')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                @csrf
                                <label for="">Latar Belakang</label>
                                <input type="file" name="background[]" class="form-control @error('background.*') is-invalid @enderror">
                                @error('background.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <a href="#" class="addkategori btn btn-success" style="float: right;"><i
                                        class="fa fa-plus"></i> Tambah Kategori</a>
                            </div>
                            <div class="kategori"></div>
                            <div class="form-group mt-4">
                                <button type="reset" class="btn btn-danger text-white"><i class="fa fa-sync"></i>
                                    Reset</button>
                                <button type="submit" class="btn btn-info text-white"><i class="fa fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
