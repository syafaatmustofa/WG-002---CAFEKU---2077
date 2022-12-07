@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <h1 align='center'>List Menu</h1>
        @foreach($data as $item)
        <div class="col-3 m-2 text-center">
            <div class="card ms-3" style="width: 18rem;">
                <img src="{{ asset('storage/'.$item->foto) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">Rp {{ $item->harga }}</p>
                    <p class="card-text">{{ $item->keterangan }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
