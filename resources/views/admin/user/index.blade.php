@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#user').DataTable();
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
                        <h2 class="m-0">Data User</h2>
                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-info float-right text-white"><i
                                class="fa fa-plus"></i> Tambah Data User</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="user">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($user as $data)
                                        @if ($data->id != '1')
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                @if ($data->hasRole('admin'))
                                                    <td>Admin</td>
                                                @elseif($data->hasRole('author'))
                                                    <td>Author</td>
                                                @endif
                                                <td>
                                                    <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <a href="{{ route('user.edit', $data->id) }}"
                                                            class="btn btn-outline-info"><i class="fa fa-edit"></i>
                                                            Edit</a>
                                                        <button type="submit"
                                                            class="btn btn-outline-danger delete-confirm"><i
                                                                class="fa fa-trash-alt"></i> Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
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
