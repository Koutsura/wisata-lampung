<?php

namespace App\Http\Controllers;

use App\Models\tiska;
use Illuminate\Http\Request;

class TiskaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiska = Tiska::all();
        return view('layouts.wisata.tiska.index', compact('tiska'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.wisata.tiska.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tiska = new Tiska();
        $tiska->nama = $request->nama;
        $tiska->nmr_tlp = $request->nmr_tlp;
        $tiska->tgl = $request->tgl;
        $tiska->jml_psr = $request->jml_psr;
        $tiska->jml_hr = $request->jml_hr;
        $tiska->akomodasi = in_array('Penginapan', $request->services) ? 'Y' : 'N';
        $tiska->transport = in_array('Transportasi', $request->services) ? 'Y' : 'N';
        $tiska->service = in_array('Servis/Makan', $request->services) ? 'Y' : 'N';
        $tiska->hrg_pkt = $request->hrg_pkt;
        $tiska->ttl_tgh = $request->ttl_tgh;

        if ($tiska->save()) {
            return redirect()->route('tiska.index')->with('message', 'Data Tiska Berhasil Disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal Menyimpan Data Tiska.');
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tiska $tiska)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tiska= Tiska::find($id);

        return view('layouts.wisata.tiska.edit', compact('tiska'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $tiska = Tiska::find($id);
        if (!$tiska) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $tiska->nama = $request->nama;
        $tiska->nmr_tlp = $request->nmr_tlp;
        $tiska->tgl = $request->tgl;
        $tiska->jml_psr = $request->jml_psr;
        $tiska->jml_hr = $request->jml_hr;
        $tiska->akomodasi = in_array('Penginapan', $request->services) ? 'Y' : 'N';
        $tiska->transport = in_array('Transportasi', $request->services) ? 'Y' : 'N';
        $tiska->service = in_array('Servis/Makan', $request->services) ? 'Y' : 'N';
        $tiska->hrg_pkt = $request->hrg_pkt;
        $tiska->ttl_tgh = $request->ttl_tgh;

        if ($tiska->save()) {
            return redirect()->route('tiska.index')->with('message', 'Data Tiska Berhasil Diubah.');
        } else {
            return redirect()->back()->with('error', 'Gagal Mengubah Data Tiska.');
        }
        return redirect()->route('tiska.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tiska = Tiska::find($id);
        if (!$tiska) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        if ($tiska->delete()) {
            return redirect()->route('tiska.index')->with('message', 'Data Tiska Berhasil Dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal Menghapus Data Tiska.');
        }
        return redirect()->route('tiska.index');
        //
    }
}
