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
            <h1>Detail Barang</h1>
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="font-weight-bold">{{ $barang->nama }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>Stok:</strong> {{ $barang->stok }}</p>
                    <p><strong>Harga: Rp </strong> {{ $barang->harga }}</p>
                    <p><strong>Deskripsi:</strong> {{ $barang->deskripsi }}</p>

                    @if ($barang->foto)
                        <img src="{{ asset('images/' . $barang->foto) }}" alt="Foto Barang" class="img-thumbnail"
                            style="max-width: 200px;">
                    @endif
                    <div>
                        <a href="{{ route('barangs.index') }}" class="btn btn-primary mt-3">Kembali</a>

                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
