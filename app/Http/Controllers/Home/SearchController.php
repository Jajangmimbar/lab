<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cariAlat(Request $request)
    {
        $cari = $request->cari;
        $now = Carbon::now();
        $alats = DB::table('alats')->where('nama_alat', 'like', "%".$cari."%")
                                    ->orWhere('nomor_asset', 'like', "%".$cari."%")
                                    ->orWhere('lokasi', 'like', "%".$cari."%")
                                    ->orWhere('merk', 'like', "%".$cari."%")
                                    ->orWhere('tipe', 'like', "%".$cari."%")
                                    ->orWhere('spesifikasi', 'like', "%".$cari."%")
                                    ->orWhere('ism', 'like', "%".$cari."%")
                                    ->orWhere('service_terakhir', 'like', "%".$cari."%")
                                    ->orWhere('service_berikutnya', 'like', "%".$cari."%")
                                    ->paginate();
        return view('alat.cari', compact('alats', 'cari', 'now'));
    }
}
