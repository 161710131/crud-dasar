<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\guru;
class gurucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan semua data post melalui model 'post'
        $gurus = guru::all();
        return view('guru.index',compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nik'=>'required|unique:gurus|max:255','nama'=>'required|max:35',]);
        $gurus = new guru;
        $gurus->nik = $request->nik;
        $gurus->nama = $request->nama;
        $gurus->save();
        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $gurus = guru::findOrFail($id);
        return view('guru.view',compact('gurus'));
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
        $gurus = guru::findOrFail($id);
        return view('guru.edit',compact('gurus'));
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
            'nik' => 'required|max:30',
            'nama' => 'required|max:30']);

        // update data berdasarkan id
        $gurus = guru::findOrFail($id);
        $gurus->nik = $request->nik;
        $gurus->nama = $request->nama;
        $gurus->save();
        return redirect()->route('guru.index');
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
        $gurus = guru::findOrFail($id);
        $gurus->delete();
        return redirect()->route('guru.index');
    }
}
