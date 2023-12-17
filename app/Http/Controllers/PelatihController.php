<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pelatihs = DB::table('pelatihs') ->get();
        return view('pelatih.index', compact('pelatihs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pelatih.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_pelatih' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'pengalaman_kerja'=> 'required',
        ]);

        $query = DB::table('pelatihs')->insert([
            'nama_pelatih' => $request['nama_pelatih'],
            'telp' => $request['telp'],
            'alamat' => $request['alamat'],
            'pengalaman_kerja'=> $request['pengalaman_kerja'],
        ]);

    return redirect()->route('pelatih.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pelatih = DB::table('pelatihs')->where('id', $id)->get();
        return view('pelatih.show', compact('pelatih'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pelatih = Pelatih::findOrFail($id);
        return view('pelatih.edit', compact('pelatih'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_pelatih' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'pengalaman_kerja'=> 'required',
        ]);
        $query = DB::table('pelatihs')->where('id', $id)->update([
            'nama_pelatih' => $request['nama_pelatih'],
            'telp' => $request['telp'],
            'alamat' => $request['alamat'],
            'pengalaman_kerja'=> $request['pengalaman_kerja'],
        ]);
        return redirect()->route('pelatih.index')->with(['success' => 'Data Pelatih Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('pelatihs')->where('id', $id)->delete();
        return redirect()->route('pelatih.index');
    }
}