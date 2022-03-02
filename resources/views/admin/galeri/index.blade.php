@extends('layouts.admin')

@section('js')
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
                        <div class="row">
                            <h3 class="col-sm-10">Galeri {{ $wisata->nama_wisata }}</h3>
                            <a href="javascript:history.back()" class="fa fa-arrow-left btn btn-secondry"
                                class="float:right;">&nbsp;Kembali</a>
                        </div>
                        <a href="galeri/create" class="btn btn-sm btn-info float-right text-white mt-3"><i
                                class="fa fa-plus"></i> Tambah Data Galeri</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Nomor</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                                @php $no=1; @endphp
                                @foreach ($galeri as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><img src=" {{ $data->galeri() }}" alt="" style="width:150px; height:150px;"
                                                alt="Gambar"></td>
                                        <td>
                                            <form action="galeri/hapus/{{ $data->id }}" method="POST">
                                                @csrf
                                                <a href="galeri/edit/{{ $data->id }}" class="btn btn-outline-info"><i
                                                        class="fa fa-edit"></i> Edit</a>
                                                <a href="galeri/show/{{ $data->id }}" class="btn btn-outline-warning"><i
                                                        class="fa fa-eye"></i> Show</a>
                                                <button type="submit" class="btn btn-outline-danger delete-confirm"><i
                                                        class="fa fa-trash-alt"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
