<?php

namespace App\Http\Controllers;

use App\Models\kedu_warna;
use Illuminate\Http\Request;

class KeduWarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kedu_warna = Kedu_warna::all();
        return view('layouts.wisata.kedu_warna.index', compact('kedu_warna'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.wisata.kedu_warna.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $kedu_warna = new Kedu_warna();
        $kedu_warna->nama = $request->nama;
        $kedu_warna->nmr_tlp = $request->nmr_tlp;
        $kedu_warna->tgl = $request->tgl;
        $kedu_warna->jml_psr = $request->jml_psr;
        $kedu_warna->jml_hr = $request->jml_hr;
        $kedu_warna->akomodasi = in_array('Penginapan', $request->services) ? 'Y' : 'N';
        $kedu_warna->transport = in_array('Transportasi', $request->services) ? 'Y' : 'N';
        $kedu_warna->service = in_array('Servis/Makan', $request->services) ? 'Y' : 'N';
        $kedu_warna->hrg_pkt = $request->hrg_pkt;
        $kedu_warna->ttl_tgh = $request->ttl_tgh;

        if ($kedu_warna->save()) {
            return redirect()->route('kedu_warna.index')->with('message', 'Data Kedu Warna Berhasil Disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal Menyimpan Data Kedu Warna.');
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(kedu_warna $kedu_warna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kedu_warna= Kedu_warna::find($id);

        return view('layouts.wisata.kedu_warna.edit', compact('kedu_warna'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kedu_warna = Kedu_warna::find($id);
        if (!$kedu_warna) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $kedu_warna->nama = $request->nama;
        $kedu_warna->nmr_tlp = $request->nmr_tlp;
        $kedu_warna->tgl = $request->tgl;
        $kedu_warna->jml_psr = $request->jml_psr;
        $kedu_warna->jml_hr = $request->jml_hr;
        $kedu_warna->akomodasi = in_array('Penginapan', $request->services) ? 'Y' : 'N';
        $kedu_warna->transport = in_array('Transportasi', $request->services) ? 'Y' : 'N';
        $kedu_warna->service = in_array('Servis/Makan', $request->services) ? 'Y' : 'N';
        $kedu_warna->hrg_pkt = $request->hrg_pkt;
        $kedu_warna->ttl_tgh = $request->ttl_tgh;

        if ($kedu_warna->save()) {
            return redirect()->route('kedu_warna.index')->with('message', 'Data Kedu Warna Berhasil Diubah.');
        } else {
            return redirect()->back()->with('error', 'Gagal Mengubah Data Kedu Warna.');
        }
        return redirect()->route('kedu_warna.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $kedu_warna = Kedu_warna::find($id);
        if (!$kedu_warna) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        if ($kedu_warna->delete()) {
            return redirect()->route('kedu_warna.index')->with('message', 'Data Kedu Warna Berhasil Dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal Menghapus Data Kedu Warna.');
        }
        return redirect()->route('kedu_warna.index');
        //
    }
}
