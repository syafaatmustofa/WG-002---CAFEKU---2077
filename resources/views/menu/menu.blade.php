@extends('layouts.app')


@section('content')
{{-- tabel data menu s--}}
<h3 align="center">KELOLA MENU</h3>
<table class="table table table-striped table-hover border">
    <div class="mx-auto pt-4 pb-4">
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#tambahdata">TAMBAH</button>
    </div>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Foto</th>
            <th scope="col">Harga</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->nama }}</td>
            <td><img src="{{ asset('storage/'.$item->foto) }}" class="rounded" width="100px"></td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>{{ $item->kategori->Nama }}</td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editdata{{ $item->id }}">EDIT</button>
                <a href="{{ route('deletemenu',$item->id) }}" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus ?')">DELETE</a>
            </td>
        </tr>
        {{-- tabel data menu en--}}

        <!-- Modal edit data S-->

        <div class="modal fade" id="editdata{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('menu.update', $item->id) }}" method="POST" id="idform" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleInput" class="form-label">nama</label>
                                <input type="text" class="form-control" name="nama" id="exampleInput" value="{{ $item->nama }}">
                            </div>
                            <img src="{{ asset('storage/'.$item->foto) }}" width="100px" alt="">
                            <div class="mb-3">
                                <label for="exampleInput" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto" id="exampleInput" value="{{ $item->foto }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInput" class="form-label">Harga</label>
                                <input type="text" class="form-control" name="harga" id="exampleInput" value="{{ $item->harga }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInput" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" id="exampleInput" value="{{ $item->keterangan }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInput" class="form-label">Kategori</label>
                                <select name="kategori_id">
                                    <option value="" selected>--Pilih Kategori--</option>
                                    @foreach($kategori as $kt)
                                    <option value="{{ $kt->id }}" {{ $kt->id == $item->kategori_id? 'selected' : '' }}>{{ $kt->Nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
{{-- modal edit data en --}}


<!-- Modal tambah data S-->
<div class="modal fade" id="tambahdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('menu.store') }}" method="POST" id="idform" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" name="nama" id="exampleInput">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" id="exampleInput">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">harga</label>
                        <input type="text" class="form-control" name="harga" id="exampleInput">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="exampleInput">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Kategori</label>
                        <select name="kategori_id">
                            <option value="" selected>--Pilih Kategori--</option>
                            @foreach($kategori as $kt)
                            <option value="{{ $kt->id }}">{{ $kt->Nama }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- modal tambah data en --}}


@endsection
