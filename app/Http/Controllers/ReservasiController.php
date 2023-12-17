<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use App\Models\Gym;
use App\Models\User;
use App\Models\Pelatih;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reservasi = Reservasi::all();
        return view("reservasi.index", compact('reservasi'));
    }

    public function createPDF() {
        // retrieve all records from db
        $data = Reservasi::all();

        // Convert the collection to an array
        $dataArray = $data->toArray();

        // share data to view
        view()->share('data', $data);

        // Use $dataArray instead of $data
        $pdf = PDF::loadView('reservasi.cetak-reservasi', $dataArray);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Gym $gyms, User $user)
    {
        //
        $gyms = Gym::all();
        $user = User::all();
        $pelatihs = Pelatih::all();
        return view('reservasi.create', compact('gyms','user', 'pelatihs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'date'   =>  'required',
            'time'       =>  'required',
        ]);

        $reservasi = Reservasi::create([
            'gym_id'                   => $request['gym_id'],
            'user_id'                  => Auth::user()->id,
            'pelatih_id'               => $request['pelatih_id'],
            'tanggal_reservasi'        => $request['date'], 
            'jam_reservasi'            => $request['time'], 
            'status'                   => 'Pending', 
        ]);

        return redirect()->route('reservasi.index')->with('success', 'reservasi telah diprosess!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $reservasi = Reservasi::with(['user', 'gym'])->find($id);
        return view('reservasi.show', compact('reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //
        $gyms = Gym::all();
        $reservasi = Reservasi::with(['user', 'gym', 'pelatih'])->find($id);
        $pelatihs = Pelatih::all();
    
        return view('reservasi.edit', compact('reservasi', 'pelatihs', 'gyms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservasi $reservasi)
    {
        //
        $request->validate([
            // 'date'   =>  'required',
            // 'time'   =>  'required',
            'status' => 'required'
        ]);
    
        $reservasi->update([
            // 'gym_id'            => $request['gym_id'],
            // 'user_id'           => Auth::user()->id,
            // 'tanggal_reservasi' => $request['date'],
            // 'jam_reservasi'     => $request['time'],
            'status'            => $request['status'],
        ]);
    
        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('reservasis')->where('id', $id)->delete();
        return redirect()->route('reservasi.index');
    }
}