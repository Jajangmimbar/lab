<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\perawatan;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::paginate(10);
        if (Auth::User()->hak_akses == "Admin"):
            return view('user.index', compact('users'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function tambahUser()
    {
        if (Auth::User()->hak_akses == "Admin"):
            return view('user.tambah');
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function postUser(Request $request)
    {
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $name = $file->getClientOriginalName();
            $request->file('foto')->move("storage/user/$request->name/", $name);
            $file = $name;
        }else{
            $file = '';
        }
        if (Auth::User()->hak_akses == "Admin"):
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->no_handphone = $request['no_handphone'];
            $user->foto = $file;
            $user->alamat = $request['alamat'];
            $user->hak_akses = $request['hak_akses'];
            $user->save();
            return redirect()->back()->with('toast_success', 'Data Berhasil Ditambah');
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function detailUser($id)
    {
        $users = User::find($id);
        if (Auth::User()->hak_akses == "Admin"):
            return view('user.detail', compact('users'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function editUser($id)
    {
        $users = User::find($id);
        if (Auth::User()->hak_akses == "Admin"):
            return view('user.edit', compact('users'));
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function updateUser(Request $request, $id)
    {
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $name = $file->getClientOriginalName();
            $request->file('foto')->move("storage/user/$request->name/", $name);
            $file = $name;
        }else{
            $file = '';
        }
        if (Auth::User()->hak_akses == "Admin"):
            $users = User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_handphone' => $request->no_handphone,
                'foto' => $file,
                'alamat' => $request['alamat'],
                'hak_akses' => $request->hak_akses
            ]);
            return redirect()->back()->with('toast_success', 'Data Berhasil Diupdate');
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function deleteUser($id)
    {
        if (Auth::User()->hak_akses == "Admin"):
            $users = User::find($id);
            $users->delete();
            return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
        elseif(Auth::User()->hak_akses == "User"):
            return view('error');
        endif;
    }
    public function riwayatPerawatan()
    {
        $perawatans = perawatan::orderBy('created_at', 'DESC')->paginate(10);
        return view('service.riwayat', compact('perawatans'));
    }
}
