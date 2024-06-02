@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Daftar Supplier</h1>
                <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3 float-right">Tambah Supplier</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supplier->nama }}</td>
                            <td>{{ $supplier->alamat }}</td>
                            <td>{{ $supplier->telepon }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <a href="{{ route('suppliers.show', $supplier->id) }}"
                                            class="dropdown-item">Lihat</a>
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}"
                                            class="dropdown-item">Edit</a>
                                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus supplier ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $suppliers->links() }}
        </div>
    @endsection
</div>
