<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\alat;
use App\Models\pinjam;
use PDF;

class PinjamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function pinjam()
    {
        $no = date('Ymd');
        $jam = date('His');
        $nomor = "PO-".$no."-".$jam;
        $alat = alat::all();
        if(Auth::User()->hak_akses == "Admin"):
            return view('pinjam.admin.tambah', compact('alat', 'nomor'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('pinjam.user.tambah', compact('alat', 'nomor'));
        endif;
    }
    public function addPinjaman(Request $request)
    {
        $no = date('Ymd');
        $jam = date('His');
        $nomor = "PO-".$no."-".$jam;
        if(Auth::User()->hak_akses == "Admin"):
            $pinjam = new pinjam();
            $pinjam->alat_id = $request['nama_alat'];
            $pinjam->kode = $nomor;
            $pinjam->tanggal_pinjam = $request['tanggal_pinjam'];
            $pinjam->tanggal_kembali = $request['tanggal_kembali'];
            $pinjam->nama_peminjam = $request['nama_peminjam'];
            $pinjam->nama_alat = $request['nama_alat'];
            $pinjam->jumlah = $request['jumlah'];
            $pinjam->keperluan = $request['keperluan'];
            $pinjam->status = "Booking";
            $pinjam->save();
            if($pinjam){
                $alat = alat::where('id', $pinjam->alat_id)->first();
                $alat->jumlah = $alat->jumlah - $pinjam->jumlah;
                $alat->update();
            }
            return redirect()->back()->with('toast_success', 'Data Berhasil Ditambah');
        elseif(Auth::User()->hak_akses == "User"):
            $pinjam = new pinjam();
            $pinjam->alat_id = $request['nama_alat'];
            $pinjam->user_id = Auth::User()->id;
            $pinjam->kode = $nomor;
            $pinjam->tanggal_pinjam = $request['tanggal_pinjam'];
            $pinjam->tanggal_kembali = $request['tanggal_kembali'];
            $pinjam->nama_peminjam = $request['nama_peminjam'];
            $pinjam->nama_alat = $request['nama_alat'];
            $pinjam->jumlah = $request['jumlah'];
            $pinjam->keperluan = $request['keperluan'];
            $pinjam->status = "Booking";
            $pinjam->save();
            if($pinjam){
                $alat = alat::where('id', $pinjam->alat_id)->first();
                $alat->jumlah = $alat->jumlah - $pinjam->jumlah;
                $alat->update();
            }
            return redirect()->back()->with('toast_success', 'Data Berhasil Ditambah');
        endif;
    }
    public function riwayatPinjam()
    {
        if(Auth::User()->hak_akses == "Admin"):
            $pinjams = pinjam::paginate(10);
            return view('pinjam.admin.riwayat', compact('pinjams'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('pinjam.user.riwayat');
        endif;
    }
    public function printRiwayat()
    {
        if(Auth::User()->hak_akses == "Admin"):
            $pinjams = pinjam::orderBy('created_at', 'DESC')->get();
            $pdf = PDF::loadView('pinjam.admin.print', compact('pinjams'))->setPaper('a4', 'potrait');
            return $pdf->stream();
        elseif(Auth::User()->hak_akses == "User"):
            $pdf = PDF::loadView('pinjam.user.print')->setPaper('a4', 'potrait');
            return $pdf->stream();
        endif;
    }
    public function statusPinjaman($id)
    {
        $pinjam = pinjam::find($id);
        if(Auth::User()->hak_akses == "Admin"):
            return view('pinjam.admin.update', compact('pinjam'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function updateStatus(Request $request, $id)
    {
        $pinjam = pinjam::where('id', $id)->first();
        $pinjam->status = $request['status'];
        $pinjam->update();
        if($pinjam->status == "Selesai"){
            $alat = alat::where('id', $pinjam->alat_id)->first();
            $alat->jumlah = $alat->jumlah + $pinjam->jumlah;
            $alat->update();
        }
        return redirect()->back()->with('toast_success', 'Data Berhasil diupdate');
    }
}
