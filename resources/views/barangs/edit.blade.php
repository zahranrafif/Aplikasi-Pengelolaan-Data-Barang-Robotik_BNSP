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
            <h1>Edit Barang</h1>
            <form action="{{ route('barangs.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $barang->nama }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $barang->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $barang->stok }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $barang->harga }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="supplier_id">Supplier</label>
                    <select name="supplier_id" class="form-control" required>
                        <option value="">Pilih Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}"
                                {{ $barang->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file" id="foto" name="foto">
                    @if ($barang->foto)
                        <div class="mt-2">
                            <img src="{{ asset('images/' . $barang->foto) }}" alt="Foto Barang" width="150">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button href="{{ route('barangs.index') }}" class="btn btn-secondary">Cancel</button>

            </form>
        </div>
    @endsection
</div>
