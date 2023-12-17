<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;
use App\Models\Pelatih;

class Gym extends Model
{
    use HasFactory;
    protected $table= "gyms";

    protected $fillable = [
        'nama_gym',
        'pelatih_id',
        'poster',
        'deskripsi',
        'paket',
        'alamat',
        'telp',
        'harga',
        'jam_operational',
        'point',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class, 'pelatih_id');
    }
}