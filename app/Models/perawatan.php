<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class perawatan extends Model
{
    protected $fillable = [
        'kode_service', 'slug', 'alat_id', 'tanggal', 'vendor', 'kerusakan', 'part', 'biaya', 'sumber_dana', 'foto_sebelum', 'foto_sesudah'
    ];
    public function alat(){
        return $this->belongsTo('App\Models\alat');
    }
}
