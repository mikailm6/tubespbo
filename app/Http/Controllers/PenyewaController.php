<?php

namespace App\Http\Controllers;

use App\Penyewa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $py = Penyewa::all();

        return view('py.index', compact('py'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('py.create');
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
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'nama_penyewa' => 'required',
            'alamat_penyewa' => 'required',
            'no_hp' => 'required',
            'email_penyewa' => 'required',
        ]);

        $user = User::create([
            'username' => $validate['username'],
            'password' => Hash::make($validate['password']),
            'level' => 1,
        ]);

        Penyewa::create([
            'id_user' => $user->id_user,
            'nama_penyewa' => $validate['nama_penyewa'] ,
            'alamat_penyewa' => $validate['alamat_penyewa'] ,
            'no_hp' => $validate['no_hp'] ,
            'email_penyewa' => $validate['email_penyewa'] ,
        ]);

        return redirect('/py')->with('success', 'Penyewa Berhasil Di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function show(Penyewa $penyewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $py = Penyewa::findOrFail($id);

        return view('py.edit', compact('py'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'nama_penyewa' => 'required',
            'alamat_penyewa' => 'required',
            'no_hp' => 'required',
            'email_penyewa' => 'required',
        ]);

        $user = User::whereId_user($validate['id_user'])->update([
            'username' => $validate['username'],
            'password' => Hash::make($validate['password']),
            'level' => 1,
        ]);

        Penyewa::whereId_penyewa($id)->update([
            'nama_penyewa' => $validate['nama_penyewa'],
            'alamat_penyewa' => $validate['alamat_penyewa'],
            'no_hp' => $validate['no_hp'],
            'email_penyewa' => $validate['email_penyewa'],
        ]);

        return redirect('/py')->with('success', 'Penyewa berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $py = Penyewa::findOrFail($id);
        $py->delete();

        return redirect('/py')->with('success', 'Penyewa berhasil di hapus');
    }
}
