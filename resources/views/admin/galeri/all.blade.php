@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#galeri').DataTable();
        });
    </script>
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/delete.js') }}"></script>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1o">
                </div>
            </div>
        </div>
    </div>
    @include('layouts._flash')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="m-0">Data Galeri</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="galeri">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Wisata</th>
                                        <th>Nama Kategori</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($galeri as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->wisata->nama_wisata }}</td>
                                            <td>{{ $data->wisata->kategori->nama_kategori }}</td>
                                            <td><img src=" {{ $data->galeri() }}" alt=""
                                                    style="width:350px; height:300px;" alt="Gambar"></td>
                                            <td>
                                                <form action="{{ $data->wisata->slug }}/galeri/hapus/{{ $data->id }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-outline-danger delete-confirm fa fa-trash-alt">
                                                        Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
