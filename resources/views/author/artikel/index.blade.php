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
                        <a href="{{ route('artikel.create') }}" class="btn btn-sm btn-primary float-right text-white"><i
                                class="fa fa-pen"></i> Tulis Artikel</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="artikel">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Judul Artikel</th>
                                        <th>Cover</th>
                                        <td>Penulis</td>
                                        <th>Aksi</th>
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
                                            <td>{{ $data->user->name }}</td>
                                            <td>
                                                <form action="{{ route('artikel.destroy', $data->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('artikel.edit', $data->id) }}"
                                                        class="btn btn-outline-info"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="{{ route('artikel.show', $data->id) }}"
                                                        class="btn btn-outline-warning"><i class="fa fa-eye"></i>
                                                        Show</a>
                                                    <button type="submit" class="btn btn-outline-danger delete-confirm"><i
                                                            class="fa fa-trash-alt"></i> Hapus</button>
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
