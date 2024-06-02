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
            <h1>Tambah Transaksi</h1>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('success'))
                <p>{{ $message }}</p>
            @endif
            <form action="{{ route('transaksis.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="barang_id" class="form-label">Barang</label>
                    <select class="form-control" id="barang_id" name="barang_id" required>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Transaksi</label>
                    <select class="form-control" id="jenis" name="jenis" required>
                        <option value="">Pilih Transaksi</option>
                        <option value="masuk">Masuk</option>
                        <option value="keluar">Keluar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Quantity</label>
                    <input type="number" id="jumlah" name="jumlah" min="1">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button href="{{ route('transaksis.index') }}" class="btn btn-secondary">Cancel</button>
            </form>
        </div>
    @endsection
</div>
