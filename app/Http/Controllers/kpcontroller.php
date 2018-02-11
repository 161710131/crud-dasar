<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kartupelajar;
class kpcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan semua data post melalui model 'post'
        $kartupelajars = kartupelajar::all();
        return view('kartupelajar.index',compact('kartupelajars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('kartupelajar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nis'=>'required|unique:kartupelajars|max:255','nama'=>'required|max:35',]);
        $kartupelajars = new kartupelajar;
        $kartupelajars->nis = $request->nis;
        $kartupelajars->nama = $request->nama;
        $kartupelajars->save();
        return redirect()->route('kp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $kartupelajars = kartupelajar::findOrFail($id);
        return view('kartupelajar.view',compact('kartupelajars'));
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
        $kartupelajars = kartupelajar::findOrFail($id);
        return view('kartupelajar.edit',compact('kartupelajars'));
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
            'nis' => 'required|max:30',
            'nama' => 'required|max:30']);

        // update data berdasarkan id
        $kartupelajars = kartupelajar::findOrFail($id);
        $kartupelajars->nis = $request->nis;
        $kartupelajars->nama = $request->nama;
        $kartupelajars->save();
        return redirect()->route('kp.index');
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
        $kartupelajars = kartupelajar::findOrFail($id);
        $kartupelajars->delete();
        return redirect()->route('kp.index');
    }
}
