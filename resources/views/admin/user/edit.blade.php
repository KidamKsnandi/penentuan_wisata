@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="col-sm-10">Edit User {{ $user->name }}</h3>
                        <a href="javascript:history.back()" class="fa fa-arrow-left btn btn-secondry" class="float:right;">&nbsp;Kembali</a>
                        </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Username</label>
                            <div class="input-group input-group-outline">
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Email</label>
                            <div class="input-group input-group-outline">
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Password Baru</label>
                            <div class="input-group input-group-outline">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Konfirmasi Password Baru</label>
                            <div class="input-group input-group-outline">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
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
