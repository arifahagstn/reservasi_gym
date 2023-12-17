<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;
use App\Models\Gym;
use App\Models\Reservasi;

class Pelatih extends Model
{
    use HasFactory;
    protected $table = "pelatihs";
    protected $fillable = [
        'id',
        'nama_pelatih',
        'gym_id',
        'telp',
        'alamat',
        'pengalaman_kerja',
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
    public function gyms()
    {
        return $this->hasMany(Gym::class, 'pelatih_id');
    }

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}