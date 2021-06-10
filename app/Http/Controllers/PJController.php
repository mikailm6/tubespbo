<?php

namespace App\Http\Controllers;

use App\PJ;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PJController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pj = PJ::all();

        return view('pj.index', compact('pj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pj.create');
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
            'nama_pj' => 'required',
            'email_pj' => 'required',
        ]);

        $user = User::create([
            'username' => $validate['username'],
            'password' => Hash::make($validate['password']),
            'level' => 1,
        ]);

        PJ::create([
            'id_user' => $user->id_user,
            'nama_pj' => $validate['nama_pj'] ,
            'email_pj' => $validate['email_pj'] ,
        ]);

        return redirect('/pj')->with('success', 'PJ Berhasil Di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PJ  $pJ
     * @return \Illuminate\Http\Response
     */
    public function show(PJ $pJ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PJ  $pJ
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pj = PJ::findOrFail($id);

        return view('pj.edit', compact('pj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PJ  $pJ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'nama_pj' => 'required',
            'email_pj' => 'required',
        ]);

        $user = User::whereId_user($validate['id_user'])->update([
            'username' => $validate['username'],
            'password' => Hash::make($validate['password']),
            'level' => 1,
        ]);

        PJ::whereId_pj($id)->update([
            'nama_pj' => $validate['nama_pj'],
            'email_pj' => $validate['email_pj'],
        ]);

        return redirect('/pj')->with('success', 'PJ berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PJ  $pJ
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pj = PJ::findOrFail($id);
        $pj->delete();

        return redirect('/pj')->with('success', 'PJ berhasil di hapus');
    }
}
