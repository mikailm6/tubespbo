<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\PJ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();

        return view('transaksi.index', compact('transaksi'));
    }

    public function pj_index()
    {
        $transaksi = Transaksi::whereStatus_transaksi(!3)->get();

        return view('transaksi.index', compact('transaksi'));
    }

    public function penyewa_index()
    {
        $id = Auth::user()->id_user;
        $transaksi = Transaksi::whereId_user($id)->get();

        return view('transaksi.index', compact('transaksi'));
    }

    public function addTransaksi(Request $request)
    {
        $validate = $request->validate([
            'id_jas' => 'required',
            'jumlah_hari' => 'required',
        ]);

        $transaksi = Transaksi::create([
            'id_jas' => $validate['id_jas'],
            'id_user' => Auth::user()->id_user,
            'id_pj' => 1,
            'jumlah_hari' => $validate['jumlah_hari'],
            'tgl_sewa' => date('Y-m-d'),
            'status_transaksi' => 0,
        ]);

        return redirect('/transaksi-penyewa')->with('success', 'Transaksi Berhasil Di input. Silahkan kirim username anda dan bukti transfer ke 0812-xxxx-xxxx dengan rekening bank xxx no rek : xxxxxxxxxx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_jas' => 'required',
            'id_pj' => 'required',
            'id_user' => 'required',
            'jumlah_hari' => 'required',
            'tgl_sewa' => 'required',
        ]);

        $transaksi = Transaksi::Create($validate);

        return redirect('/transaksi-proses')->with('success', 'Transaksi Berhasil Di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pj_id = PJ::whereId_user(Auth::user()->id_user)->get();

        return view('transaksi.edit', compact('transaksi', 'pj_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'id_jas' => 'required',
            'id_pj' => 'required',
            'id_user' => 'required',
            'jumlah_hari' => 'required',
            'tgl_sewa' => 'required',
            'status_transaksi' => 'required',
        ]);

        Transaksi::whereId_transaksi($id)->update([
            'id_jas' => $validate['id_jas'],
            'id_user' => $validate['id_user'],
            'id_pj' => $validate['id_pj'],
            'jumlah_hari' => $validate['jumlah_hari'],
            'tgl_sewa' => $validate['tgl_sewa'],
            'status_transaksi' => $validate['status_transaksi'],
        ]);

        return redirect('/transaksi-proses')->with('success', 'Transaksi berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect('/transaksi')->with('success', 'Transaksi Berhasil Di Cancel');
    }
}
