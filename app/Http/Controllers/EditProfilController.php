<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class EditProfilController extends Controller
{
    public function index_admin(){
        $user=User::where('id','=',Auth::User()->id)->get();

        return view("admin.editprofil",compact('user'));
        // return view("dosen.unduhinformasi", compact('informasi'));
    }
    public function index_dosen(){
        $user=User::where('id','=',Auth::User()->id)->get();

        return view("dosen.editprofil",compact('user'));
    }

    public function edit1(Request $request, $id)
    {
        // update data dosen

        $user = User::find($id);
        $user->name=$request->name;
        $user->prodi=$request->prodi;
        $user->email=$request->email;
        $user->alamat=$request->alamat;
        $user->no_hp=$request->no_hp;
        $user->save();

       
        return redirect('admin/editprofil')->with(['success' => 'Data Berhasil diubah']);
    }
    public function edit2(Request $request, $id)
    {
        // update data dosen

        $user = User::find($id);
        $user->name=$request->name;
        $user->prodi=$request->prodi;
        $user->email=$request->email;
        $user->alamat=$request->alamat;
        $user->no_hp=$request->no_hp;
        $user->save();

        
       
        return redirect('dosen/editprofil')->with(['success' => 'Data Berhasil diubah']);
    }
}
