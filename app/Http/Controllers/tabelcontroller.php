<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabel;
class tabelcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan semua data post melalui model 'post'
        $tabels = tabel::all();
        return view('tabel.tampilan',compact('tabels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tabel.buat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nomor_ktp'=>'required|unique:tabels|max:255','nama'=>'required|max:35',]);
        $tabels = new tabel;
        $tabels->nomor_ktp = $request->nomor_ktp;
        $tabels->nama = $request->nama;
        $tabels->save();
        return redirect()->route('tabel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $tabels = tabel::findOrFail($id);
        return view('tabel.menampilkan',compact('tabels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // memanggil data pos berdasrkan id di halaman pos edit
        $tabels = tabel::findOrFail($id);
        return view('tabel.ubah',compact('tabels'));
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
        // unique dihapus karena ketika update data title tidak diubah juga tidak apa-apa
        $this->validate($request,[
            'nomor_ktp' => 'required|max:30',
            'nama' => 'required|max:30']);

        // update data berdasarkan id
        $tabels = tabel::findOrFail($id);
        $tabels->nomor_ktp = $request->nomor_ktp;
        $tabels->nama = $request->nama;
        $tabels->save();
        return redirect()->route('tabel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // delete data beradasarkan id
        $tabels = tabel::findOrFail($id);
        $tabels->delete();
        return redirect()->route('tabel.index');
    }
}
