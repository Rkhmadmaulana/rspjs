<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tb_jadwal_dokter extends Model
{
    protected $fillable = [
        'tb_dokter_id',
        'poliklinik',
        'hari_kerja',
        'jam_mulai',
        'jam_selesai'
    ];
    public function tbdokter(): BelongsTo
    {
        return $this->belongsTo(tb_dokter::class);
    }
    // public function TbJadwalDokter(): HasMany
    // {
    //     return $this->hasMany(tb_jadwal_dokter::class);
    // }
}
