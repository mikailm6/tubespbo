<?php

namespace App\Http\Controllers;

use App\Jas;
use App\ImageGallery;
use Illuminate\Http\Request;

class JasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jas = Jas::all();

        return view('jas.index', compact('jas'));
    }

    public function produkpenyewa()
    {
        $jas = Jas::all();

        return view('jas.index_py', compact('jas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jas.create');
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
            'nama_jas' => 'required',
            'model_jas' => 'required',
            'warna_jas' => 'required',
            'ukuran_jas' => 'required',
            'hargaPerHari' => 'required|numeric',
            'gambar' => 'required',
        ]);

        $validate['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('gambar'), $validate['gambar']);

        $jas = Jas::create($validate);

        return redirect('/jas')->with('success', 'Jas Berhasil Di input');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jas  $jas
     * @return \Illuminate\Http\Response
     */
    public function show(Jas $jas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jas  $jas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jas = Jas::findOrFail($id);

        return view('jas.edit', compact('jas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jas  $jas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_jas' => 'required',
            'model_jas' => 'required',
            'warna_jas' => 'required',
            'ukuran_jas' => 'required',
            'hargaPerHari' => 'required|numeric',
            'gambar' => 'required',
        ]);

        $validate['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('gambar'), $validate['gambar']);

        Jas::whereId_jas($id)->update($validate);

        return redirect('/jas')->with('success', 'Jas berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jas  $jas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jas = Jas::findOrFail($id);
        $jas->delete();

        return redirect('/jas')->with('success', 'Jas Berhasil Di hapus');
    }
}
