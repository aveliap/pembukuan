<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaksi;
use App\Customer;
use App\Laundry;



class TransaksiController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function __construct(){
       $this->middleware('auth');
     }

     public function getDetails($id)
     {
    try {
        $data = Laundry::where('kode_laundry',$id)->first();
        echo json_encode($data);
        exit;
        // $getFields = Laundry::where('kode_laundry',$request->kode_laundry)->first();
        // // here you could check for data and throw an exception if not found e.g.
        // // if(!$getFields) {
        // //     throw new \Exception('Data not found');
        // // }
        // return response()->json($getFields, 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => $e->getMessage()
        ], 500);
      }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $transaksi = Transaksi::all();
      $customer = Customer::all();
      $laundry = Laundry::all();
      return view('Transaksi.transaksi',
      // compact('transaksi', 'customer', 'laund')
      [

        'transaksi' => $transaksi,
        'customer' => $customer,
        'laundry' => $laundry


      ]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laundry = Laundry::all();
        $customer = Customer::all();
        // $hrg = ($laundry->harga);
        // $jml = ($transaksi->total_kilo);
        // $tot = $hrg*$jml;

      return view('Transaksi.tambahTran', [
        'data' => new Transaksi(),
        'cust' => $customer,
        'laundry' => $laundry


      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $detLaundry = Laundry::find($request->id_detLaundry);
      // $TR=DB::table('transaksis')
      //         ->join('det__laundries', 'transaksis.detLaundry_id','=','det__laundries.kode_laundry')

      // $id_detLaundry=($transaksi->detLaundry_id);
      // $Lundry = Laundry::find($id_detLaundry);

      // $totalharga = $request->total_kilo*$hrg;

      $request->validate([
            'invoice' => 'required',
            'customer_id' => 'required',
            'detLaundry_id' => 'required',
            'total_kilo' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required'

        ]);

        $package = Laundry::find($request->detLaundry_id);
        $cost = $request->total_kilo * $package->harga;


      $transaksi = new Transaksi();
      $transaksi->invoice = $request->input('invoice');
      $transaksi->total_kilo = $request->input('total_kilo');
      $transaksi->detLaundry_id = $request->input('detLaundry_id');
      $transaksi->start_date = $request->input('start_date');
      $transaksi->end_date = $request->input('end_date');
      $transaksi->status = $request->input('status');
      $transaksi->customer_id = $request->input('customer_id');
      $transaksi->Total = $cost;
      $transaksi->save();
      return redirect ('Transaksi');

      // $request->validate([
      //     'total_kilo' => 'required',
      //     'status' => 'required',
      //     'Total' => 'required'
      // ]);
      // Penjualan::create([
      //
      //   'total_kilo' => $request->total_kilo,
      //   'start_date' => $request->start_date,
      //   'end_date' => $request->end_date,
      //   'status' => $request->status,
      //   'customer_id' => $request->customer_id,
      //   'harga' => $request->harga,
      //   'Total' => $totalharga
      // ]);

      return redirect('Transaksi');
      // $transaksi = new Transaksi();
      // $transaksi->total_kilo = $request->input('total_kilo');
      // $transaksi->start_date = $request->input('start_date');
      // $transaksi->end_date = $request->input('end_date');
      // $transaksi->status = $request->input('status');
      // $transaksi->customer_id = $request->input('customer_id');
      // $transaksi->harga = $request->input('harga');
      // $transaksi->Total = $request->input('Total');
      // $transaksi->save();
      // return redirect ('Transaksi');
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
      $customer = Customer::all();
      return view('Transaksi.editTran', [
      'data' => Transaksi::findOrFail($id),
      'cust' => $customer
    ]);
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
      $transaksi = Transaksi::findOrFail($id);
      // $transaksi->total_kilo = $request->input('total_kilo');
      // $transaksi->start_date = $request->input('start_date');
      // $transaksi->end_date = $request->input('end_date');
      $transaksi->status = $request->input('status');
      // $transaksi->customer_id = $request->input('customer_id');
      // $transaksi->harga = $request->input('harga');
      // $transaksi->Total = $request->input('Total');

      $transaksi->save();
      return redirect ('Transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $transaksi = Transaksi::findOrFail($id);
      $transaksi->delete();
      return redirect('Transaksi');
    }
}
