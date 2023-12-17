<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gym;
use App\Models\User;
use App\Models\Pelatih;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = "reservasis";
    protected $fillable = [
        'gym_id',
        'user_id',
        'pelatih_id',
        'tanggal_reservasi',
        'jam_reservasi',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id');
    }

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class);
    }
}