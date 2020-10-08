<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pinjam extends Model
{
    protected $fillable = [
        'alat_id', 'user_id', 'kode', 'tanggal_pinjam', 'tanggal_kembali', 'nama_peminjam', 'nama_alat', 'jumlah', 'keperluan', 'status'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function alat(){
        return $this->belongsTo('App\Models\alat');
    }
}
