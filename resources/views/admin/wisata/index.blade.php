@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#wisata').DataTable();
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
                        <h2 class="m-0">Data Wisata Bandung</h2>
                        <a href="{{ route('wisata.create') }}" class="btn btn-sm btn-info float-right text-white"><i
                                class="fa fa-plus"></i> Tambah Data Wisata</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="wisata">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Wisata</th>
                                        <th>Kategori Wisata</th>
                                        <th>Lokasi</th>
                                        <th>Deskripsi Kategori</th>
                                        <th>Harga Tiket</th>
                                        <th>Cover</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($wisata as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_wisata }}</td>
                                            <td>{{ $data->kategori->nama_kategori }}</td>
                                            <td>{{ $data->lokasi }}</td>
                                            <td><a href="{{ $data->slug }}/deskripsi" class="text-dark">Deskripsi
                                                    {{ $data->nama_wisata }}</a></td>
                                            <td><a href="{{ $data->slug }}/harga" class="text-dark">Harga
                                                    {{ $data->nama_wisata }}</a></td>
                                            <td><img src="{{ $data->cover() }}" alt="" style="width:150px; height:150px;"
                                                    alt="Cover"></td>
                                            <td>
                                                <?php $state = json_decode($data->status); ?>
                                                @if (!empty($state[0]) && !empty($state[1]))
                                                    {{ $state[0] }} dan {{ $state[1] }}
                                                @elseif(!empty($state[0])) {{ $state[0] }}
                                                @else {{ $data->status }}
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('wisata.destroy', $data->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('wisata.edit', $data->id) }}"
                                                        class="btn btn-outline-info"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="{{ $data->slug }}/galeri" class="btn btn-outline-warning"><i
                                                            class="fa fa-eye"></i> Lihat Galeri</a>
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
