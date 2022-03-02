@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Kategori</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <div class="input-group input-group-outline">
                                <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ url('/admin/kategori') }}"
                                class="btn btn-block btn-info form-control text-white"><i class="fa fa-arrow-left"></i>
                                Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
