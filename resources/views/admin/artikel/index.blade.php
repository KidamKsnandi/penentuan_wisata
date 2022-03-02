@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#artikel').DataTable();
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
                        <h2 class="m-0">Data Artikel</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="artikel">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Judul Artikel</th>
                                        <th>Cover</th>
                                        <th>Konten</th>
                                        <td>Penulis</td>
                                        <th>Aksi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($artikel as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->judul }}</td>
                                            <td><img src="{{ $data->cover() }}" alt="" style="width:150px; height:150px;"
                                                    alt="Cover"></td>
                                            <td>Konten {{ $data->judul }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>
                                                <form action="article/delete/{{ $data->id }}" method="POST">
                                                    @csrf
                                                    <a href="/admin/article/lihat/{{ $data->id }}"
                                                        class="btn btn-outline-warning"><i class="fa fa-eye"></i>
                                                        Lihat</a>
                                                    <button type="submit" class="btn btn-outline-danger delete-confirm"><i
                                                            class="fa fa-trash-alt"></i> Hapus</button>
                                                </form>
                                            </td>
                                            <td>
                                                <?php $slide = json_decode($data->status); ?>
                                                @if (!empty($slide[0]) && !empty($slide[1]))
                                                    {{ $slide[0] }} dan {{ $slide[1] }}
                                                @elseif(!empty($slide[0])) {{ $slide[0] }}
                                                @else {{ $data->status }}
                                                @endif
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
