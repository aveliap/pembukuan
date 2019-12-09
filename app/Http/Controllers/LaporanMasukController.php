<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Customer;
use PDF;
class LaporanMasukController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function __construct(){
       $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
return view('Laporan.Laporan_Masuk');
      // $transaksi = Transaksi::all();
      // $customer = Customer::all();
      // return view('Laporan.Laporan_Masuk', [
      //   'data' => $transaksi,
      //   'cust' => $customer
      //
      // ]);
    }

    public function cetak_pdf()
      {
      	$transaksi = Transaksi::all();

      	$pdf = PDF::loadview('Laporan.LapMasuk_pdf',['transaksi'=>$transaksi]);
      	return $pdf->download('laporan-pemasukan.pdf');
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
        //
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
