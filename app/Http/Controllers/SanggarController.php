<?php

namespace App\Http\Controllers;

use App\Models\sanggar;
use Illuminate\Http\Request;

class SanggarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sanggar = Sanggar::all();
        return view('layouts.wisata.sanggar.index', compact('sanggar'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.wisata.sanggar.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sanggar = new Sanggar();
        $sanggar->nama = $request->nama;
        $sanggar->nmr_tlp = $request->nmr_tlp;
        $sanggar->tgl = $request->tgl;
        $sanggar->jml_psr = $request->jml_psr;
        $sanggar->jml_hr = $request->jml_hr;
        $sanggar->akomodasi = in_array('Penginapan', $request->services) ? 'Y' : 'N';
        $sanggar->transport = in_array('Transportasi', $request->services) ? 'Y' : 'N';
        $sanggar->service = in_array('Servis/Makan', $request->services) ? 'Y' : 'N';
        $sanggar->hrg_pkt = $request->hrg_pkt;
        $sanggar->ttl_tgh = $request->ttl_tgh;

        if ($sanggar->save()) {
            return redirect()->route('sanggar.index')->with('message', 'Data sanggar Berhasil Disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal Menyimpan Data sanggar.');
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(sanggar $sanggar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sanggar= Sanggar::find($id);

        return view('layouts.wisata.sanggar.edit', compact('sanggar'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sanggar = Sanggar::find($id);
        if (!$sanggar) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $sanggar->nama = $request->nama;
        $sanggar->nmr_tlp = $request->nmr_tlp;
        $sanggar->tgl = $request->tgl;
        $sanggar->jml_psr = $request->jml_psr;
        $sanggar->jml_hr = $request->jml_hr;
        $sanggar->akomodasi = in_array('Penginapan', $request->services) ? 'Y' : 'N';
        $sanggar->transport = in_array('Transportasi', $request->services) ? 'Y' : 'N';
        $sanggar->service = in_array('Servis/Makan', $request->services) ? 'Y' : 'N';
        $sanggar->hrg_pkt = $request->hrg_pkt;
        $sanggar->ttl_tgh = $request->ttl_tgh;

        if ($sanggar->save()) {
            return redirect()->route('sanggar.index')->with('message', 'Data sanggar Berhasil Diubah.');
        } else {
            return redirect()->back()->with('error', 'Gagal Mengubah Data sanggar.');
        }
        return redirect()->route('sanggar.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sanggar = Sanggar::find($id);
        if (!$sanggar) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        if ($sanggar->delete()) {
            return redirect()->route('sanggar.index')->with('message', 'Data sanggar Berhasil Dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal Menghapus Data sanggar.');
        }
        return redirect()->route('sanggar.index');
        //
    }
}
