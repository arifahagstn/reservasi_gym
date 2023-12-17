<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Pelatih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CloudinaryStorage;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gyms = DB::table('gyms') ->get();
        return view('gym.index', compact('gyms'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pelatihs = Pelatih::all();
        return view('gym.create', compact('pelatihs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Gym $gym)
    {
        //
        $request->validate([
            'nama_gym'        => 'required',
            'pelatih_id'    => 'required',
            'poster'          => 'required',
            'deskripsi'       => 'required',
            'paket'           => 'required',
            'alamat'          => 'required',
            'telp'            => 'required',
            'harga'           => 'required',
            'jam_operational' => 'required',
            'point'           => 'required',
        ]);

        $image  = $request->file('poster');
        if ($image) {
            $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            // Jangan lupa menyimpan $result ke dalam kolom yang sesuai dalam tabel Gym jika dibutuhkan.
        }

        // Gym::create($request->all());

        Gym::create([
            'nama_gym'        => $request['nama_gym'],
            'pelatih_id'      => $request['pelatih_id'],
            'deskripsi'       => $request['deskripsi'],
            'paket'           => $request['paket'],
            'poster'          => $result->getSecurePath(),
            'alamat'          => $request['alamat'],
            'telp'            => $request['telp'],
            'harga'           => $request['harga'],
            'jam_operational' => $request['jam_operational'],
            'point'          => $request['point'],
        ]);

        return redirect()->route('gym.index')->with(['success' => 'Data Berhasil Dismpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $gym = DB::table('gyms')
        ->join('pelatihs', 'gyms.pelatih_id', '=', 'pelatihs.id')
        ->select('gyms.*', 'pelatihs.nama_pelatih')
        ->where('gyms.id', $id)
        ->get();
        $pelatihs = Pelatih::all();
        return view('gym.show', compact('gym', 'pelatihs'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $gym = Gym::find($id);
        $pelatihs = Pelatih::all();
        return view('gym.edit', compact('gym', 'pelatihs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gym $gym)
{
    try {
        $request->validate([
            'nama_gym'        => 'required',
            'pelatih_id'      => 'required',
            'poster'          => 'sometimes',
            'deskripsi'       => 'required',
            'paket'           => 'required',
            'alamat'          => 'required',
            'telp'            => 'required',
            'harga'           => 'sometimes',
            'jam_operational' => 'sometimes',
            'point'           => 'sometimes',
        ]);
        // dd($request);
        if($request->harga != null) {
            $gym->update([
                'harga' => $request['harga']
            ]);
        }
        if($request->jam_operational != null) {
            $gym->update([
                'jam_operational' => $request['jam_operational']
            ]);
        }
        if($request->point != null) {
            $gym->update([
                'point' => $request['point']
            ]);
        }

        // Menangani upload gambar
        $image = $request->file('poster');
        if ($image) {
            $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            $gym->update([
                'poster' => $result->getSecurePath(),
            ]);
        }

        // Memastikan objek $gym valid sebelum pembaruan
        if (!$gym) {
            return redirect()->route('gym.index')->with(['error' => 'Data Gym tidak ditemukan.']);
        }

        // Melakukan pembaruan data
        $gym->update([
            'nama_gym'        => $request['nama_gym'],
            'pelatih_id'      => $request['pelatih_id'],
            // 'poster'          => $result->getSecurePath(),
            'deskripsi'       => $request['deskripsi'],
            'paket'           => $request['paket'],
            'alamat'          => $request['alamat'],
            'telp'            => $request['telp'],
            // 'harga'           => $request['harga'],
            // 'jam_operational' => $request['jam_operational'],
            // 'point'           => $request['point'],
        ]);

        return redirect()->route('gym.index')->with(['success' => 'Data Berhasil Diupdate!']);
    } catch (\Exception $e) {
        return redirect()->route('gym.index')->with(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('gyms')->where('id', $id)->delete();
        return redirect()->route('gym.index');
    }
}