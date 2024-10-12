<?php

namespace App\Http\Controllers;

use App\Models\marina;
use Illuminate\Http\Request;

class MarinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marina = Marina::all();
        return view('layouts.wisata.marina.index', compact('marina'));

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.wisata.marina.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $marina = new marina();
        $marina->nama = $request->nama;
        $marina->nmr_tlp = $request->nmr_tlp;
        $marina->tgl = $request->tgl;
        $marina->jml_psr = $request->jml_psr;
        $marina->jml_hr = $request->jml_hr;
        $marina->akomodasi = in_array('Penginapan', $request->services) ? 'Y' : 'N';
        $marina->transport = in_array('Transportasi', $request->services) ? 'Y' : 'N';
        $marina->service = in_array('Servis/Makan', $request->services) ? 'Y' : 'N';
        $marina->hrg_pkt = $request->hrg_pkt;
        $marina->ttl_tgh = $request->ttl_tgh;

        if ($marina->save()) {
            return redirect()->route('marina.index')->with('message', 'Data Marina Berhasil Disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal Menyimpan Data Marina.');
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(marina $marina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $marina= marina::find($id);

        return view('layouts.wisata.marina.edit', compact('marina'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $marina = marina::find($id);
        if (!$marina) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $marina->nama = $request->nama;
        $marina->nmr_tlp = $request->nmr_tlp;
        $marina->tgl = $request->tgl;
        $marina->jml_psr = $request->jml_psr;
        $marina->jml_hr = $request->jml_hr;
        $marina->akomodasi = in_array('Penginapan', $request->services) ? 'Y' : 'N';
        $marina->transport = in_array('Transportasi', $request->services) ? 'Y' : 'N';
        $marina->service = in_array('Servis/Makan', $request->services) ? 'Y' : 'N';
        $marina->hrg_pkt = $request->hrg_pkt;
        $marina->ttl_tgh = $request->ttl_tgh;

        if ($marina->save()) {
            return redirect()->route('marina.index')->with('message', 'Data Marina Berhasil Diubah.');
        } else {
            return redirect()->back()->with('error', 'Gagal Mengubah Data Marina.');
        }
        return redirect()->route('marina.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marina = marina::find($id);
        if (!$marina) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        if ($marina->delete()) {
            return redirect()->route('marina.index')->with('message', 'Data Marina Berhasil Dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal Menghapus Data Marina.');
        }
        return redirect()->route('marina.index');
        //
    }
}
