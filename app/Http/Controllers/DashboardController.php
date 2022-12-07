<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampil data
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses data
        $jumlahPesanan = 0;
        if($request->pesanan != null){
            $pesanan = $request->pesanan;
            $jumlahPesanan = count($pesanan);
        }
        $status = $request->status;
        $totalPesanan = $jumlahPesanan * 50000;
        $pesan = new totalPembayaran($status,$totalPesanan);
        $bayar = $pesan->pembayaran();

        // create data
        $data = [
            'nama' => $request->nama,
            'jumlahPesanan' => $jumlahPesanan,
            'totalPesanan' => $totalPesanan,
            'status' => $status,
            'diskon' => $pesan->diskon($status,$totalPesanan),
            'totalPembayaran' => $bayar
        ];
        // return data
        return view('dashboard',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

// interface order
interface Order{
    public function diskon();
}

// class diskon implements
class Diskon implements Order{
    // __construct data
    public function __construct($status,$totalPesanan)
    {
        $this->status = $status;
        $this->totalPesanan = $totalPesanan;
    }

    //method diskon 
    public function diskon()
    {
        if($this->status == 'member' && $this->totalPesanan >=100000){
            return $this->totalPesanan * (20/100);
        }elseif($this->status == 'member' && $this->totalPesanan < 100000){
            return $this->totalPesanan * (10/100);
        }else{
            return $this->totalPesanan * (0/100);
        }
    }
}
// class total inheritance diskon
class totalPembayaran extends Diskon{
    public function pembayaran()
    {
        return (int)$this->totalPesanan - (int)$this->diskon($this->status,$this->totalPesanan);
    }
}
