@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <form action="{{ route('dashboard.store', []) }}" method="POST">
                    @csrf
                    <div class="card-header bg-success text-center text-light">
                        <h3>ORDER MENU</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Pesanan Cafeku</label>
                            <div class="form-check">
                                <input class="form-check-input" name="pesanan[]" value="cappuchino" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Cappuchino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pesanan[]" value="americano" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Americano
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="pesanan[]" value="v60" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    V60
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="member">Member</option>
                                <option value="nonmember" selected>Non Member</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header bg-warning text-center text-light"><h3>HASIL ORDER MENU</h3></div>
                <div class="card-body">
                    @isset($data)
                    <div class="mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" value="{{ $data['nama'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Jumlah Pesanan</label>
                        <input type="number" class="form-control" value="{{ $data['jumlahPesanan'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Total Pesanan</label>
                        <input type="number" class="form-control" value="{{ $data['totalPesanan'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <input type="text" class="form-control" value="{{ $data['status'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Diskon</label>
                        <input type="number" class="form-control" value="{{ $data['diskon'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Total Pembayaran</label>
                        <input type="number" class="form-control" value="{{ $data['totalPembayaran'] }}" readonly>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
