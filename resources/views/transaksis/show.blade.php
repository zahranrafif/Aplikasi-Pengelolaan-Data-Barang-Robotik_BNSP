@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h1>Detail Transaksi</h1>
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="font-weight-bold">{{ $transaksi->barang_id }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>Jenis:</strong> {{ $transaksi->jenis }}</p>
                    <p><strong>Quantity: </strong> {{ $transaksi->jumlah }}</p>
                    <div>
                        <a href="{{ route('suppliers.index') }}" class="btn btn-primary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
