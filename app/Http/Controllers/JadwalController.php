<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Gym;
use App\Models\Pelatih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gym = Gym::all(); 
        $jadwal = Jadwal::all();
        return view("jadwal.index", compact('jadwal', 'gym'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Gym $gym, Pelatih $pelatih)
    {
        //
        $gym = Gym::all();
        $pelatih = Pelatih::all();
        return view('jadwal.create', compact('gym','pelatih'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Jadwal $jadwal, Pelatih $pelatih)
    {
        //
        $request->validate([
            'nama_gym'=> 'required',
            'pelatih'=> 'required',
            'senin'=> 'required',
            'selasa'=> 'required',
            'rabu'=> 'required',
            'kamis'=> 'required',
            'jumat'=> 'required',
            'sabtu'=> 'required',
            'minggu'=> 'required',
        ]);

        $jadwal = Jadwal::create([
            'gym_id'=> $request['nama_gym'],
            'pelatih_id'=> $request['pelatih'],
            'senin'=> $request['senin'],
            'selasa'=> $request['selasa'],
            'rabu'=> $request['rabu'],
            'kamis'=> $request['kamis'],
            'jumat'=> $request['jumat'],
            'sabtu'=> $request['sabtu'],
            'minggu'=> $request['minggu'],
        ]);

        return redirect()->route('jadwal.index')->with('success','Jadwal telah ditambahakan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $jadwal = Jadwal::findOrFail($id);
        $gyms = Gym::find($jadwal->gym_id);
        $pelatihs = Pelatih::find($jadwal->pelatih_id);
        return view('jadwal.show', compact('jadwal','gyms','pelatihs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $jadwal = Jadwal::find($id);
        $gym = Gym::all();
        $pelatih = Pelatih::all();

        return view('jadwal.edit', compact('gym','pelatih','jadwal'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
        $request->validate([
            'nama_gym'=> 'required',
            'pelatih'=> 'required',
            'senin'=> 'required',
            'selasa'=> 'required',
            'rabu'=> 'required',
            'kamis'=> 'required',
            'jumat'=> 'required',
            'sabtu'=> 'required',
            'minggu'=> 'required',
        ]);

        $jadwal->update([
            'gym_id'=> $request['nama_gym'],
            'pelatih_id'=> $request['pelatih'],
            'senin'=> $request['senin'],
            'selasa'=> $request['selasa'],
            'rabu'=> $request['rabu'],
            'kamis'=> $request['kamis'],
            'jumat'=> $request['jumat'],
            'sabtu'=> $request['sabtu'],
            'minggu'=> $request['minggu'],
        ]);

        return redirect()->route('jadwal.index',$jadwal->id)->with('success','jadwal telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('jadwals')->where('id', $id)->delete();
        return redirect()->route('jadwal.index');
    }
}