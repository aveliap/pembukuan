<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Laundry;
use App\Tipe;

class LaundryController extends Controller
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
      $Laundry = Laundry::all();
      $type = Tipe::all();
      return view('Laundry.Laundry', [
        'data' => $Laundry,
        'tipe' => $type
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $type = Tipe::all();
      return view('Laundry.tambahLaundry', [
        'data' => new Laundry(),
        'tipe' => $type
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
      $Laundry = new Laundry();
      $Laundry->kode_laundry = $request->input('kode_laundry');
      $Laundry->nama_laundry = $request->input('nama_laundry');
      $Laundry->jumlah_kilo = $request->input('jumlah_kilo');
      $Laundry->id_tipe_laundry = $request->input('id_tipe_laundry');
      $Laundry->harga = $request->input('harga');
      $Laundry->save();
      return redirect ('Laundry');
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
      $data=Laundry::findOrFail($id);
      $type = Tipe::all();
      return view('Laundry.editLaundry', [
        'data' => $data,
        'tipe' => $type
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
      $Laundry = Laundry::findOrFail($id);
      $Laundry->kode_laundry = $request->input('kode_laundry');
      $Laundry->nama_laundry = $request->input('nama_laundry');
      $Laundry->jumlah_kilo = $request->input('jumlah_kilo');
      $Laundry->id_tipe_laundry = $request->input('id_tipe_laundry');
      $Laundry->harga = $request->input('harga');
      $Laundry->save();
      return redirect ('Laundry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $Laundry = Laundry::findOrFail($id);
      $Laundry->delete();
      return redirect('Laundry');
    }
}
