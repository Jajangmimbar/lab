<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\alat;
use App\Models\perawatan;
use Carbon\Carbon;
use DB;
use PDF;
use Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function service($id)
    {
        $alats = alat::find($id);
        if(Auth::User()->hak_akses == "Admin"):
            return view('service.index', compact('alats'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function tambahService($id)
    {
        $no = date('Ymd');
        $jam = date('His');
        $nomor = "SO-".$no."-".$jam;
        $alats = alat::find($id);
        if(Auth::User()->hak_akses == "Admin"):
            return view('service.tambah', compact('alats', 'nomor'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function addService(Request $request, $id)
    {
        $alats = alat::find($id);
        $data = $alats->ism * 30;
        $terakhir = $request->tanggal;
        $end = Carbon::parse($terakhir)->addDays($data);
        $bet = $end->format('Y-m-d');
        $no = date('Ymd');
        $jam = date('His');
        $nomor = "SO-".$no."-".$jam;
        if($request->hasFile('foto_sebelum')){
            $file = $request->file('foto_sebelum');
            $name = $file->getClientOriginalName();
            $request->file('foto_sebelum')->move("storage/service/$request->vendor/", $name);
            $file = $name;
        }else{
            $file = '';
        }
        if($request->hasFile('foto_sesudah')){
            $files = $request->file('foto_sesudah');
            $name = $files->getClientOriginalName();
            $request->file('foto_sesudah')->move("storage/service/$request->vendor/", $name);
            $files = $name;
        }else{
            $files = '';
        }
        $slug = uniqid();
        $perawatan = new perawatan();
        $perawatan->alat_id = $alats->id;
        $perawatan->kode_service = $nomor;
        $perawatan->slug = $slug;
        $perawatan->tanggal = $request['tanggal'];
        $perawatan->vendor = $request['vendor'];
        $perawatan->kerusakan = $request['kerusakan'];
        $perawatan->part = $request['part'];
        $perawatan->biaya = $request['biaya'];
        $perawatan->sumber_dana = $request['sumber_dana'];
        $perawatan->foto_sebelum = $file;
        $perawatan->foto_sesudah = $files;
        $perawatan->save();

        if($perawatan){
            $alat = alat::where('id', $alats->id)->update([
                'service_terakhir' => $terakhir,
                'service_berikutnya' => $bet,
                'status' => "Selesai"
            ]);
            
        }
        // dd($perawatan);
        return redirect()->back()->with('toast_success', 'Data Berhasil Masuk');
    }
    public function detailService($slug)
    {
        $perawatan = perawatan::whereSlug($slug)->firstOrFail();
        if(Auth::User()->hak_akses == "Admin"):
            return view('service.detail', compact('perawatan'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function editService($slug)
    {
        $perawatan = perawatan::whereSlug($slug)->firstOrFail();
        if(Auth::User()->hak_akses == "Admin"):
            return view('service.edit', compact('perawatan'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function updateService(Request $request, $slug)
    {
        if($request->hasFile('foto_sebelum')){
            $file = $request->file('foto_sebelum');
            $name = $file->getClientOriginalName();
            $request->file('foto_sebelum')->move("storage/service/$request->vendor/", $name);
            $file = $name;
        }else{
            $file = '';
        }
        if($request->hasFile('foto_sesudah')){
            $files = $request->file('foto_sesudah');
            $name = $files->getClientOriginalName();
            $request->file('foto_sesudah')->move("storage/service/$request->vendor/", $name);
            $files = $name;
        }else{
            $files = '';
        }

        $perawatan = perawatan::whereSlug(($slug), $request->slug)->update([
            'vendor' => $request->vendor,
            'kerusakan' => $request->kerusakan,
            'part' => $request->part,
            'biaya' => $request->biaya,
            'sumber_dana' => $request->sumber_dana,
            'foto_sebelum' => $file,
            'foto_sesudah' => $files
        ]);
        return redirect()->back()->with('toast_success', 'Data Berhasil Diupdate');
    }
    public function printAll($id)
    {
        $alats = alat::find($id);
        $pdf = PDF::loadView('service.print_all', compact('alats'))->setPaper('a4', 'potrait');
        return $pdf->download();
    }
    public function printDetail($slug)
    {
        $perawatans = perawatan::whereSlug($slug)->firstOrFail();
        $pdf = PDF::loadView('service.print_detail', compact('perawatans'))->setPaper('a4', 'potrait');
        return $pdf->download();
    }
    public function prints()
    {
        $perawatans = perawatan::orderBy('created_at', 'DESC')->get();
        $pdf = PDF::loadView('service.prints', compact('perawatans'))->setPaper('a4', 'potrait');
        return $pdf->download();
    }
}
