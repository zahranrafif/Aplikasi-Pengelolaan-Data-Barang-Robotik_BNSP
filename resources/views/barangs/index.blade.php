@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Daftar Barang</h1>
                <a href="{{ route('barangs.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
            </div>
            <div class="row">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($barang->foto)
                                        <img src="{{ asset('images/' . $barang->foto) }}" alt="Foto Barang"
                                            class="img-thumbnail" style="max-width: 100px;">
                                    @endif
                                </td>
                                <td>{{ $barang->nama }}</td>
                                <td>{{ $barang->deskripsi }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>Rp {{ $barang->harga }}</td>
                                <td>{{ $barang->supplier->nama }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="{{ route('barangs.show', $barang->id) }}">Detail</a>
                                            <a class="dropdown-item"
                                                href="{{ route('barangs.edit', $barang->id) }}">Edit</a>
                                            <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
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
                {{ $barangs->links() }}
            </div>
        </div>
    @endsection
</div>
