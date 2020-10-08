<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\alat;
use Carbon\Carbon;
use Alert;
use App\Models\perawatan;
use App\Models\pinjam;
use PDF;
use Auth;
use App\User;
use DB;

class AlatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index(){
    //     return view('auth.login');
    // }
    public function home(){
        $alats = alat::paginate(10);
        $now = Carbon::now();
        $users = User::all();
        $perawatans = perawatan::all();
        $pinjams = pinjam::all();
        Alert::success('Selamat Datang', 'Lab Perancangan Mesin ');
        return view('home', compact('alats', 'now', 'users', 'perawatans', 'pinjams'));
    }
    public function tambah(){
        if(Auth::User()->hak_akses == "Admin"):
            return view('alat.tambah');
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function tambahAlat(Request $request)
    {
    //     $validator = Validator::make($request->all(), [
    // 		'manual_book' => 'mimes: pdf'
    //   ]);
      
    //   if($validator->fails()){
    //     return redirect()->back()->with('toast_error', $validator->messages()->all()[0])->withInput();
    //   }
      if($request->hasFile('manual_book')){
            $file = $request->file('manual_book');
            $name = $file->getClientOriginalName();
            $request->file('manual_book')->move("storage/alat/$request->nama_alat/", $name);
            $file = $name;
        }else{
            $file = '';
        }
        if($request->hasFile('foto_alat')){
            $files = $request->file('foto_alat');
            $name = $files->getClientOriginalName();
            $request->file('foto_alat')->move("storage/alat/$request->nama_alat/", $name);
            $files = $name;
        }else{
            $files = '';
        }
        $data = $request->ism * 30;
        $end = Carbon::parse($request->service_terakhir)->addDays($data);
        $bet = $end->format('Y-m-d');

        $slug = uniqid();
        $alat = new alat();
        $alat->slug = $slug;
        $alat->nama_alat = $request['nama_alat'];
        $alat->nomor_asset = $request['nomor_asset'];
        $alat->lokasi = $request['lokasi'];
        $alat->merk = $request['merk'];
        $alat->tipe = $request['tipe'];
        $alat->jumlah = $request['jumlah'];
        $alat->spesifikasi = $request['spesifikasi'];
        $alat->ism = $request['ism'];
        $alat->service_terakhir = $request['service_terakhir'];
        if($alat->ism == NULL){
            $alat->service_berikutnya = NULL;
        }else{
            $alat->service_berikutnya = $bet;
        }
        $alat->manual_book = $file;
        $alat->foto_alat = $files;
        if($alat->ism == NULL){
            $alat->status == NULL;
        }else{
            $alat->status == "Belum";
        }
        $alat->save();
        return redirect()->back()->with('toast_success', 'Data Berhasil Ditambah');
        // dd($alat);
    }
    public function detailAlat($slug)
    {
        $alats = alat::whereSlug($slug)->firstOrFail();
        return view('alat.detail', compact('alats'));
    }
    public function editAlat($slug)
    {
        $alats = alat::whereSlug($slug)->firstOrFail();
        if(Auth::User()->hak_akses == "Admin"):
            return view('alat.edit', compact('alats'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function updateALat(Request $request, $slug)
    {
        if($request->hasFile('manual_book')){
            $file = $request->file('manual_book');
            $name = $file->getClientOriginalName();
            $request->file('manual_book')->move("storage/alat/$request->nama_alat/", $name);
            $file = $name;
        }else{
            $file = '';
        }
        if($request->hasFile('foto_alat')){
            $files = $request->file('foto_alat');
            $name = $files->getClientOriginalName();
            $request->file('foto_alat')->move("storage/alat/$request->nama_alat/", $name);
            $files = $name;
        }else{
            $files = '';
        }
        $data = $request->ism * 30;
        $end = Carbon::parse($request->service_terakhir)->addDays($data);
        $bet = $end->format('Y-m-d');

       
        $alats = alat::whereSlug(($slug), $request->slug)->update([
            'nama_alat' => $request->nama_alat,
            'nomor_asset' => $request->nomor_asset,
            'lokasi' => $request->lokasi,
            'merk' => $request->merk,
            'tipe' => $request->tipe,
            'jumlah' => $request->jumlah,
            'spesifikasi' => $request->spesifikasi,
        //     'ism' => $request->ism,
        //     'service_terakhir' => $request->service_terakhir,
        // //    'service_berikutnya' =>  
        // //     'service_berikutnya' => $bet,
            'manual_book' => $file,
            'foto_alat' => $files
        ]);
        return redirect()->back()->with('toast_success', 'Data Berhasil Diupdate');
    }
    public function deleteAlat($id)
    {
        $alats = alat::find($id);
        $alats->delete();
        if($alats){
            $perawatan = perawatan::where('alat_id', $id)->firstOrFail();
            $perawatan->delete();
        }
        return redirect('/home');
    }
    public function printAlat()
    {
        $alats = alat::all();
        $pdf = PDF::loadView('alat.print', compact('alats'))->setPaper('a4', 'potrait');
        return $pdf->download();
    }
    public function daftarAlat()
    {
        $alats = alat::paginate(10);
        return view('alat.daftar_alat', compact('alats'));
    }
}
