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
            <h1>Detail Supplier</h1>
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="font-weight-bold">{{ $supplier->nama }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>Alamat:</strong> {{ $supplier->alamat }}</p>
                    <p><strong>Telepon: </strong> {{ $supplier->telepon }}</p>
                    <p><strong>Email:</strong> {{ $supplier->email }}</p>
                    <div>
                        <a href="{{ route('suppliers.index') }}" class="btn btn-primary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
