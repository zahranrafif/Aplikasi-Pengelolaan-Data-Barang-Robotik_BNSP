@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="container">
            <h1>Edit Supplier</h1>

            <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $supplier->nama }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat">{{ $supplier->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon"
                        value="{{ $supplier->telepon }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $supplier->email }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancel</button>
            </form>
        </div>
    @endsection
</div>
