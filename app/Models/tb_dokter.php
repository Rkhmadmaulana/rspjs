<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_dokter extends Model
{
        protected $fillable = [
                'nm_dokter',
                'jk',
                'tmp_lahir',
                'tgl_lahir',
                'gol_drh',
                'agama',
                'almt_tgl',
                'no_telp',
                'stts_nikah',
                'kd_sps',
                'alumni',
                'no_ijin_praktek',
                'status',
                'image',
                'created_at',
                'update_at'

        ];
        public function tb_jadwal_dokter(): HasMany
        {
            return $this->hasMany(tb_jadwal_dokter::class);
        }
}
