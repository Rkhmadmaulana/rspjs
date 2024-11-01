<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aplicare_ketersediaan_kamar extends Model
{
        protected $fillable = [
                'kode_kelas_aplicare',
                'kd_bangsal',
                'kelas',
                'kapasitas',
                'tersedia',
                'tersediapria',
                'tersediawanita'
        ]; 
}
