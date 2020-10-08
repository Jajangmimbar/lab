<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alat extends Model
{
    protected $fillable = [
        'slug', 'nama_alat', 'nomor_asset', 'lokasi', 'merk', 'tipe', 'jumlah', 'spesifikasi', 'ism', 'service_terakhir', 'service_berikutnya', 'manual_book', 'foto_alat', 'status'
    ];
    public function perawatan(){
        return $this->hasMany('App\Models\perawatan');
    }
    public function pinjam(){
        return $this->hasMany('App\Models\pinjam');
    }
}
